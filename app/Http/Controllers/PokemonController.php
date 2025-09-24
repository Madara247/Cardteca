<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Pokemon;
use App\Models\Squadra;
use Illuminate\Support\Facades\Log;

class PokemonController extends BaseController
{
    public function home()
    {
        if (!Session::get('user_id')) {
            return redirect('login');
        }
        $user = User::find(Session::get('user_id'));
        return view('squadra')->with('username', $user->name);
    }

public function list()
{
    $user_id = Session::get('user_id');
    if (!$user_id) return response()->json([]);

    $user = User::find($user_id);
    if (!$user) return response()->json([]);

    $squadra = $user->squadra()->with('pokemon')->get();

    // Debug: quanti elementi?
    Log::info("Squadra count: ".$squadra->count());

    $result = $squadra->map(function($entry) {
        return [
            'nome' => $entry->pokemon->nome,
            'sprite_url' => $entry->pokemon->sprite_url,
            'tipo' => $entry->pokemon->tipo,
            'pivot_id' => $entry->id,
        ];
    });

    return response()->json($result);
}

   public function add($nome)
{
    Log::info("Add chiamato con nome: " . $nome);

    $user_id = Session::get('user_id');
    Log::info("User_id in session: " . $user_id);

    if (!$user_id) {
        return response()->json(['error' => 'Utente non autenticato']);
    }

    $count = Squadra::where('user_id', $user_id)->count();
    Log::info("Pokemon in squadra: " . $count);
    if ($count >= 6) {
        return response()->json(['error' => 'Limite squadra raggiunto']);
    }

    $pokemon = Pokemon::where('nome', strtolower($nome))->first();

    if (!$pokemon) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/" . strtolower($nome));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl, CURLOPT_CAINFO, "C:/Xampp/apache/bin/curl-ca-bundle.crt"); 
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($curl);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
        Log::error("Errore cURL: " . $error_msg);
    }
    curl_close($curl);

Log::info("HTTP code: " . $httpcode);


        if ($httpcode != 200) {
            Log::info("Errore pokeapi, httpcode: " . $httpcode);
            return response()->json(['error' => 'Pokémon non trovato']);
        }

        $data = json_decode($response, true);

        $pokemon = new Pokemon;
        $pokemon->nome = $data['name'];
        $pokemon->sprite_url = $data['sprites']['front_default'] ?? '';
        $pokemon->tipo = $data['types'][0]['type']['name'] ?? '';
        $pokemon->save();

        Log::info("Pokemon salvato nel DB: " . $pokemon->nome);
    }

    $exists = Squadra::where('user_id', $user_id)->where('pokemon_id', $pokemon->id)->first();
    if ($exists) {
        return response()->json(['error' => 'Pokémon già in squadra']);
    }

    $entry = new Squadra;
    $entry->user_id = $user_id;
    $entry->pokemon_id = $pokemon->id;
    $saved = $entry->save();

    Log::info("Salvataggio squadra risultato: " . ($saved ? 'success' : 'fail'));

    $result = $this->list();

    return response()->json($result->getData(true) ?: []);
}






   public function remove_pkm($pivot_id)
{
    if (!Session::get('user_id')) {
        return response()->json([]);
    }

    $entry = Squadra::find($pivot_id);

    if (!$entry || $entry->user_id != Session::get('user_id')) {
        return response()->json(['error' => 'Operazione non autorizzata']);
    }

    $entry->delete();

    // Carica squadra aggiornata e ritorna
    $user = User::find(Session::get('user_id'));
    $squadra = $user->squadra()->with('pokemon')->get();

    $result = $squadra->map(function($entry) {
        return [
            'nome' => $entry->pokemon->nome,
            'sprite_url' => $entry->pokemon->sprite_url,
            'tipo' => $entry->pokemon->tipo,
            'pivot_id' => $entry->id,
        ];
    });

    return response()->json($result);
}

    public function search($term)
    {
        if (!Session::get('user_id')) {
            return [];
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/" . strtolower($term));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpcode != 200) {
            return [];
        }

        $data = json_decode($response, true);

        $pokemon = [
            'nome' => $data['name'],
            'sprite_url' => $data['sprites']['front_default'] ?? '',
            'tipo' => $data['types'][0]['type']['name'] ?? '',
        ];

        return [$pokemon];
    }
}
