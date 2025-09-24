@extends('layouts.app')
@section('title', 'Crea il tuo trio')
@section('head')
@parent
	<title>Crea il tuo trio</title>
    <link href="https://fonts.googleapis.com/css?family=Pangolin:400,700|Proxima+Nova" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ url('Css/minigame.css') }}"/>
    <script src="{{ url('js/constants.js') }}" defer="true"></script>
    <script src="{{ url('js/script_mhw2.js') }}" defer="true"></script>
@endsection




@section('content')
    <article>
	<div id="gioco-wrapper">
	  <h1>Crea il tuo trio</h1>
    <h2>scegli il trio perfetto: uno per tipo!</h2>

      <section class="question-name">
        <h1>Tipo erba:</h1>
      </section>

      <section class="choice-grid">
        <div data-choice-id="blep" data-question-id="one">
          <img src="Immagini/MiniGame/erba/bulbasaur.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="happy" data-question-id="one">
          <img src="Immagini/MiniGame/erba/chikorita.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="sleeping" data-question-id="one">
          <img src="Immagini/MiniGame/erba/treecko.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="dopey" data-question-id="one">
          <img src="Immagini/MiniGame/erba/turtwig.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="burger" data-question-id="one">
          <img src="Immagini/MiniGame/erba/snivy.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="cart" data-question-id="one">
          <img src="Immagini/MiniGame/erba/chespin.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="nerd" data-question-id="one">
          <img src="Immagini/MiniGame/erba/rowlet.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="shy" data-question-id="one">
          <img src="Immagini/MiniGame/erba/grookey.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="sleepy" data-question-id="one">
          <img src="Immagini/MiniGame/erba/sprigatito.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>
      </section>

      <section class="question-name">
        <h1>Tipo Fuoco:</h1>
      </section>

      <section class="choice-grid">
        <div data-choice-id="blep" data-question-id="two">
          <img src="Immagini/MiniGame/fuoco/charmander.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="happy" data-question-id="two">
          <img src="Immagini/MiniGame/fuoco/cyndaquil.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="sleeping" data-question-id="two">
          <img src="Immagini/MiniGame/fuoco/torchic.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="dopey" data-question-id="two">
          <img src="Immagini/MiniGame/fuoco/chimchar.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="burger" data-question-id="two">
          <img src="Immagini/MiniGame/fuoco/tepig.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="cart" data-question-id="two">
          <img src="Immagini/MiniGame/fuoco/fennekin.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="nerd" data-question-id="two">
          <img src="Immagini/MiniGame/fuoco/litten.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="shy" data-question-id="two">
          <img src="Immagini/MiniGame/fuoco/scorbunny.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="sleepy" data-question-id="two">
          <img src="Immagini/MiniGame/fuoco/fuecoco.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>
      </section>

      <section class="question-name">
        <h1>Tipo Acqua:</h1>
      </section>

      <section class="choice-grid">
        <div data-choice-id="blep" data-question-id="three">
          <img src="Immagini/MiniGame/acqua/squirtle.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="happy" data-question-id="three">
          <img src="Immagini/MiniGame/acqua/totodile.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="sleeping" data-question-id="three">
          <img src="Immagini/MiniGame/acqua/mudkip.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="dopey" data-question-id="three">
          <img src="Immagini/MiniGame/acqua/piplup.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="burger" data-question-id="three">
          <img src="Immagini/MiniGame/acqua/oshawott.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="cart" data-question-id="three">
          <img src="Immagini/MiniGame/acqua/froakie.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="nerd" data-question-id="three">
          <img src="Immagini/MiniGame/acqua/popplio.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="shy" data-question-id="three">
          <img src="Immagini/MiniGame/acqua/sobble.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>

        <div data-choice-id="sleepy" data-question-id="three">
          <img src="Immagini/MiniGame/acqua/quaxly.jpg"/>
          <img class="checkbox" src="Immagini/MiniGame/unchecked.png"/>
        </div>
      </section>

    </article></div>
@endsection