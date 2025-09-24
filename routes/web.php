<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\regcontroller;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CuriController;


Route::get('/curiosita', [CuriController::class, 'index'])->name('curiosita.index');
Route::post('/curiosita/toggle', [CuriController::class, 'togglePreferito'])->name('curiosita.toggle');



use Illuminate\Support\Facades\Log;
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/chi_siamo', function () {
    return view('chi_siamo');
})->name('chi_siamo');
 
Route::get('/minigioco', function () {
    return view('minigioco');
})->name('minigioco');

Route::get('/contatti', function () {
    return view('contatti');
})->name('contatti');
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/registrati', function () {
    return view('registrati');
})->name('registrati');  
Route::get('/shop', function () {
    return view('shop');
})->name('shop'); 
Route::get('/account', function () {
    return view('account');
})->name('account');
Route::get('/termini', function () {
    return view('termini');
})->name('termini');
Route::get('/registrati', [regcontroller::class, 'register_form'])->name('registrati');
Route::post('/registrati', [regcontroller::class, 'do_register'])->name('registrati');
Route::get('/login', [regcontroller::class, 'login_form'])->name('login');
Route::post('/login', [regcontroller::class, 'do_login'])->name('login');
Route::post('/logout', [regcontroller::class, 'logout'])->name('logout');


Route::get('/squadra', [PokemonController::class, 'home'])->name('squadra.home');
// Route per ottenere la lista dei Pokémon della squadra (in json)
Route::get('/squadra/list', [PokemonController::class, 'list'])->name('squadra.list');
Route::post('/squadra/add/{nome}', [PokemonController::class, 'add'])->name('squadra.add');
// Route per rimuovere un Pokémon dalla squadra (passando l'id pivot o id squadra)
Route::delete('/squadra/remove/{pivot_id}', [PokemonController::class, 'remove_pkm'])->name('squadra.remove');
// Route per cercare un Pokémon (es. autocomplete o ricerca veloce)
Route::get('/squadra/search/{term}', [PokemonController::class, 'search'])->name('squadra.search');

Route::get('/account', [AccountController::class, 'show'])->name('account');







