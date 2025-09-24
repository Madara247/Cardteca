<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class CardController extends Controller
{
    public function show($id)
{
    $cards = [
        1 => [
            'title' => 'Charizard Base Set',
            'description' => 'Una delle carte più iconiche del set base.',
            'image' => asset('immagini/charizard.jpg'),
        ],
        2 => [
            'title' => 'Pikachu Illustrator',
            'description' => 'La carta Pokémon più rara mai stampata.',
            'image' => asset('immagini/pikachu.jpg'),
        ],
        3 => [
            'title' => 'Rayquaza Gold Star',
            'description' => 'Una delle carte più ricercate dai collezionisti.',
            'image' => asset('immagini/rayquaza.jpg'),
        ],
        4 => [
            'title' => 'Lugia Crystal',
            'description' => 'Una carta leggendaria del set Acquapolis.',
            'image' => asset('immagini/lugiac.jpg'),
        ],
        5 => [
            'title' => 'Shining Tyranitar',
            'description' => 'Una delle prime shiny.',
            'image' => asset('immagini/shiningty.jpg'),
        ],
        6 => [
            'title' => 'Snorlax livello X',
            'description' => 'Una carta potente e molto amata dai fan.',
            'image' => asset('immagini/snorlaxx.jpg'),
        ],
        7 => [
            'title' => 'Rayquaza e Deoxys leggenda',
            'description' => 'Una carta iconica con un design mozzafiato.',
            'image' => asset('immagini/Raydeolegg.jpg'),
        ],
        8 => [
            'title' => 'Lugia shiny segreta',
            'description' => 'Una carta adorabile e molto ricercata.',
            'image' => asset('immagini/lugiashiny.jpg'),
        ],
        9 => [
            'title' => 'Charizard Secret Gold',
            'description' => 'Una carta molto amata dai fan e rara.',
            'image' => asset('immagini/charizardg.jpg'),
        ],
    ];

    return response()->json($cards[$id] ?? []);
}
}

