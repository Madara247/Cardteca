<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Preferito;
use Illuminate\Support\Facades\Log;

class CuriController extends Controller
{
    // Metodo che restituisce le curiosità (con HTML in descrizione)
    public function getCuriosita()
    {
        return [
            1 => [
                'id' => 1,
                'titolo' => 'Le prime carte EX',
                'descrizione' => "<h2>1. Quando e dove sono uscite?</h2><p>Le prime carte Pokémon-EX in assoluto sono state introdotte nel set chiamato <strong>EX Ruby & Sapphire</strong>, uscito nel 2003 in Giappone e poco dopo in Occidente.</p><p>Questa è stata la prima volta in cui è stato usato il termine &quot;EX&quot; nel nome della carta.</p><h2>2. Cosa sono le carte EX in Rubino & Zaffiro?</h2><p>Le carte EX in questa era erano carte di Pokémon molto potenti e rare.</p><p>Erano rappresentate da Pokémon con artwork grandi e dettagliati, spesso con effetti olografici lucidi.</p><p>Queste carte hanno dato il via alla meccanica di Pokémon-EX, ma con regole leggermente diverse rispetto alle versioni successive (come quelle di Black & White).</p><h2>3. Come funzionavano le EX di Rubino & Zaffiro?</h2><p>Queste carte rappresentavano Pokémon molto forti, spesso leggendari o pseudo-leggendari (es. Rayquaza EX, Blaziken EX).</p><p>Quando venivano messi KO, l’avversario prendeva due carte premio invece di una (questo è sempre stato il tratto distintivo delle carte EX).</p><p>Tuttavia, le meccaniche precise e le mosse erano differenti da quelle successive; per esempio, non erano ancora state uniformate le meccaniche di gioco che abbiamo visto nelle versioni moderne.</p><h2>4. Esempi famosi di carte EX Rubino & Zaffiro</h2><ul><li>Rayquaza EX (EX Ruby & Sapphire)</li><li>Blaziken EX</li><li>Lugia EX (anche se Lugia EX è più famosa nella serie EX Dragon Frontiers)</li><li>Salamence EX</li><li>Metagross EX</li></ul><p>Queste carte erano tra le più rare e potenti di quel periodo.</p><h2>5. Perché sono speciali?</h2><p>Sono le prime carte EX mai stampate nella storia del Pokémon TCG, precedendo di anni l’introduzione di EX nella serie Black & White.</p><p>Hanno un grande valore storico e collezionistico.</p><p>Il loro design ha influenzato il modo in cui sono state create le carte Pokémon-EX nelle generazioni successive.</p><h2>6. Aspetto e rarità</h2><p>Hanno un bordo spesso e un layout diverso rispetto alle carte EX successive.</p><p>Sono tipicamente olografiche con artwork di dimensioni maggiori rispetto alle carte normali.</p><p>Molto ricercate dai collezionisti.</p>",
                'immagine' => asset('immagini/ex.jpg'),
            ],
            2 => [
                'id' => 2,
                'titolo' => 'Le Gold Star',
                'descrizione' => "<h2>1. Quando e dove sono uscite le Gold Star?</h2>
<p>Le carte Pokémon <strong>Gold Star</strong> sono state introdotte per la prima volta nel <em>set EX Team Rocket Returns</em>, uscito nel 2004 in Giappone e poco dopo in Occidente.</p>
<p>Queste carte sono diventate subito molto popolari tra i collezionisti per la loro rarità e per la presenza di Pokémon cromatici (shiny).</p>

<h2>2. Cosa sono le carte Gold Star?</h2>
<p>Le carte Gold Star sono una particolare tipologia di carte Pokémon caratterizzate da un piccolo simbolo a forma di stella dorata accanto al nome del Pokémon.</p>
<p>Queste carte mostrano il Pokémon in versione <strong>shiny</strong>, cioè con colori alternativi rispetto alla versione standard.</p>
<p>Oltre all'aspetto cromatico, spesso le Gold Star presentano artwork unici e dettagliati, rendendole estremamente desiderabili.</p>

<h2>3. Come funzionavano le Gold Star?</h2>
<p>Le Gold Star avevano le stesse regole delle carte normali, ma venivano spesso utilizzate in deck competitivi proprio per la loro potenza e unicità.</p>
<p>Erano inoltre molto rare da trovare nei pacchetti, il che aumentava il loro valore tra i collezionisti.</p>

<h2>4. Esempi famosi di carte Gold Star</h2>
<ul>
<li>Charizard Gold Star</li>
<li>Espeon Gold Star</li>
<li>Umbreon Gold Star</li>
<li>Rayquaza Gold Star</li>
<li>Gyarados Gold Star</li>
</ul>
<p>Queste carte sono considerate tra le più preziose e ricercate del gioco di carte collezionabili Pokémon.</p>

<h2>5. Perché sono speciali?</h2>
<p>Le Gold Star sono speciali perché combinano la rarità, il design unico e la rappresentazione dei Pokémon shiny, una caratteristica molto apprezzata dai fan.</p>
<p>Il simbolo della stella dorata le distingue da tutte le altre carte e spesso hanno valori molto alti nelle aste e nelle vendite da collezione.</p>

<h2>6. Aspetto e rarità</h2>
<p>Le carte Gold Star hanno un bordo nero lucido e il simbolo della stella dorata accanto al nome del Pokémon.</p>
<p>L'artwork spesso presenta sfondi colorati e dinamici che evidenziano la rarità e il prestigio della carta.</p>
<p>Estremamente rare e difficili da trovare, rappresentano un vero e proprio tesoro per i collezionisti Pokémon.</p>",
                'immagine' => asset('immagini/goldstar.jpg'),
            ],
            3 => [
                'id' => 3,
                'titolo' => 'Alakazam come prima carta',
                'descrizione' => "<h2>1. Alakazam nel Set Base</h2>
<p>Alakazam è una delle carte più iconiche del <strong>Set Base</strong>, la prima espansione del gioco di carte collezionabili Pokémon, uscita nel 1999.</p>
<p>In questo set, Alakazam è particolarmente apprezzato per il suo artwork classico e per essere stato una delle prime carte olografiche a essere stampate.</p>

<h2>2. Perché è speciale?</h2>
<p>Alakazam è spesso ricordato per essere stato uno dei Pokémon più potenti del Set Base, usato in molti deck competitivi.</p>
<p>Inoltre, questa carta è legata al famoso <strong>errore Shadowless</strong>, ovvero una versione della carta senza l’ombra attorno all’immagine, che la rende ancora più rara e ricercata dai collezionisti.</p>

<h2>3. Il Set Base e il suo valore storico</h2>
<p>Il Set Base è il primo set ufficiale del Pokémon TCG, quello che ha introdotto le regole e le meccaniche fondamentali del gioco.</p>
<p>Le carte Shadowless, come la versione di Alakazam, rappresentano le prime stampe di questo set, caratterizzate dall’assenza dell’ombra sul bordo destro dell’immagine della carta.</p>
<p>Queste carte sono oggi molto ricercate e spesso valgono molto di più delle versioni normali per la loro rarità e valore storico.</p>

<h2>4. L’importanza di Alakazam nella collezione</h2>
<p>Per i collezionisti, avere un Alakazam Shadowless in buone condizioni è un vero tesoro, simbolo delle origini del gioco e di un’epoca d’oro per il Pokémon TCG.</p>
<p>Questa carta non solo rappresenta un pezzo di storia, ma anche un oggetto di grande valore economico e affettivo.</p>
",
                'immagine' => asset('immagini/alakazam.jpg'),
            ],
            
        ];
    }

    public function index(Request $request)
    {
        $idUtente = Session::get('user_id');

        $curiosita = $this->getCuriosita();


        $preferitiUtente = Preferito::where('id_utente', $idUtente)
            ->pluck('id_articolo')
            ->toArray();

        return view('curiosita', [
            'curiosita' => $curiosita,
            'preferitiUtente' => $preferitiUtente,
            'idUtente' => $idUtente,
        ]);
    }

    
    public function togglePreferito(Request $request)
    {
        $idUtente = $request->input('id_utente');
        $idArticolo = $request->input('id_articolo');

       
            $preferito = Preferito::where('id_utente', $idUtente)
                ->where('id_articolo', $idArticolo)
                ->first();

            if ($preferito) {
                $preferito->delete();
                return response()->json(['status' => 'rimosso']);
            } else {
                $nuovo = new Preferito();
                $nuovo->id_utente = $idUtente;
                $nuovo->id_articolo = $idArticolo;
                $nuovo->save();

                return response()->json(['status' => 'aggiunto']);
            }
        
           
        
    }
}