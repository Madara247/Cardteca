<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Preferito;  
use App\Http\Controllers\CuriController;

class AccountController extends Controller
{
 public function show()
{
    $user_id = Session::get('user_id');
    if (!$user_id) {
        return view('account');
    }

    $user = User::with(['squadra.pokemon'])->find($user_id);
    if (!$user) {
        Session::flush();
        return redirect('login');
    }

    $preferitiIds = Preferito::where('id_utente', $user_id)->pluck('id_articolo')->toArray();

    $curiController = new CuriController();
    $curiositaTutte = $curiController->getCuriosita();

    // Ricostruisco l'array con chiave = id
    $curiositaTutteById = [];
    foreach ($curiositaTutte as $curio) {
        $curiositaTutteById[$curio['id']] = $curio;
    }

    $curiositaPreferite = [];
    foreach ($preferitiIds as $idArticolo) {
        if (isset($curiositaTutteById[$idArticolo])) {
            $curiositaPreferite[] = (object) $curiositaTutteById[$idArticolo];
        }
    }

    return view('account', [
        'user' => $user,
        'squadra' => $user->squadra->map(fn($entry) => $entry->pokemon),
        'curiositaPreferite' => $curiositaPreferite,
    ]);
}
}

