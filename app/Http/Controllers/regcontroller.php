<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class regcontroller extends Controller
{
   
	public function login_form(){
		if(Session::get('user_id')){
			return redirect('home');
		}
		$error = Session::get('error');
		Session::forget('error');
		return view('login')->with('error', $error);
	}
	
	public function do_login(){
		Log::info('Entrato in do_login', request()->all());
		if(Session::get('user_id')){
			return redirect('home');
		}
		//validare i dati 
		if(strlen(request('email')) == 0 || strlen(request('password'))  == 0){
			Session::put('error', 'empty_fields');
			return redirect('login')->withInput();
		}
		
		$user = User::where('email', request('email'))->first();
		if(!$user || !password_verify(request('password'), $user->password)){
			Session::put('error', 'wrong');
			return redirect('login')->withInput();
			
		}
			
		//login 
		Session::put('user_id', $user->id);
		//redirect alla home
		return redirect('home');
	}
	
	
	public function register_form(){
		if(Session::get('user_id')){
			return redirect('home');
		}
		$error = Session::get('error');
		Session::forget('error');
		return view('registrati')->with('error', $error);
	}
	
	public function do_register(){

		Log::info('Entrato in do_register', request()->all());

		if(Session::get('user_id')){
			return redirect('home');
		}
		//validare i dati 
		if(strlen(request('name')) == 0 || strlen(request('password'))  == 0){
			Session::put('error', 'empty_fields');
			return redirect('registrati')->withInput();
		

		}else if(request('password') != request('confirm_password')){
			Session::put('error', 'Bad_password');
			return redirect('registrati')->withInput();
			
		}else if(User::where('name', request('name'))->first()){
			Session::put('error', 'existing');
			return redirect('registrati')->withInput();
			
        }else if(strlen(request('password')) < 8){
			Session::put('error', 'Short_password');
			return redirect('registrati')->withInput();
		
		}else if(strlen(request('name')) >=  16){
			Session::put('error', 'Long_username');
			return redirect('registrati')->withInput();
			
		}else if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', request('name'))){
			Session::put('error', 'Bad_Username');
			return redirect('registrati')->withInput();
			
		}else if(!filter_var(request('email'), FILTER_VALIDATE_EMAIL)){
			Session::put('error', 'Bad_email');
			return redirect('registrati')->withInput();
			
		}else if (!request()->has('terms')) {
    		Session::put('error', 'Missing_terms');
    		return redirect('registrati')->withInput();
		}
    
		
		//creazione utente
		$user = new User;

$user->name = request('name');
$user->email = request('email');
$user->age = request('age') ? request('age') : null; 
$user->password = password_hash(request('password'), PASSWORD_BCRYPT);

$file = request()->file('profile_image');
if($file && $file->isValid())
{
    $type = exif_imagetype($file->path());
    $allowedExt = [IMAGETYPE_PNG => 'png', IMAGETYPE_JPEG => 'jpg', IMAGETYPE_GIF => 'gif'];

    if(!isset($allowedExt[$type]))
    {
        Session::put('error', 'FileTypeNotValid');
        return redirect('registrati')->withInput();
    }
    else if($file->getSize() > 7000000)
    {
        Session::put('error', 'BigFile');
        return redirect('registrati')->withInput();
    }
    else
    {
        $path = $file->store('profile_images', 'public');
        $filename = basename($path);
        $user->profile_image = $filename;
    }
}

$user->save();

Session::put('user_id', $user->id);

return redirect('home');
	}
	
	public function check($username){
		$usernameC = User::where('name', $username)->first();
		return ['exists' => $usernameC !== null];
	}
	
	public function checkEmail($email){
		$emailC = User::where('email', $email)->first();
		return ['exists' => $emailC !== null];
	}
	
	public function logout(){
		Session::flush();
		return redirect('home');
	}
}

