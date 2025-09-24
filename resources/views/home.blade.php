@extends('layouts.app')
@section('title', 'Cardteca - Home')

@section('content')
<div class="container">
        <div class="card" data-id="1">
            <h3>Charizard Base Set</h3>
            <p>Una delle carte più iconiche del mondo Pokémon.</p>
        </div>
        <div class="card"  data-id="2">
            <h3>Pikachu Illustrator</h3>
            <p>La carta Pokémon più rara mai stampata.</p>
        </div>
        <div class="card" data-id="3">
            <h3>Rayquaza Gold Star</h3>
            <p>Una delle carte più ricercate dai collezionisti.</p>
        </div>
        <div class="card" data-id="4">
            <h3>Lugia cristallino</h3>
            <p>Una carta leggendaria del set Acquapolis</p>
        </div>
        <div class="card"  data-id="5">
            <h3>Shining Tyranitar</h3>
            <p>Una delle prime shiny.</p>
        </div>
        <div class="card" data-id="6">
            <h3>Snorlax Livello x</h3>
            <p>Una carta potente e molto amata dai fan.</p>
        </div>
        <div class="card" data-id="7">
            <h3>Rayquaza e deoxys leggenda</h3>
            <p>Una carta iconica con un design mozzafiato.</p>
        </div>
        <div class="card"  data-id="8">
            <h3>Lugia shiny segreta</h3>
            <p>Una carta rara e molto ricercata.</p>
        </div>
        <div class="card" data-id="9">
            <h3>Charizard secret gold</h3>
            <p>Una carta molto amata dai fan e rara.</p>
        </div>
</div>
<div id="card-modal" class="modal hidden">
    <div class="modal-content">
        <span id="close-modal">&times;</span>
        <h3 id="modal-title"></h3>
        <img id="modal-image" src="" alt="">
        <p id="modal-description"></p>
    </div>
</div>
<script src="{{ asset('js/modal.js') }}"></script>





@endsection


