<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/home.css' )}}">
    @yield('head')
</head>
<body>

    <header>
        
    <h1>
    <img src="{{ asset('immagini/deoxys.gif') }}" id="foto">
    Cardteca - Il mondo delle carte collezionabili &ensp;
    <img src="{{ asset('immagini/logohome.gif') }}">
</h1>

        
        <nav>
            <img id="fot" src="{{ asset('immagini/deoxys.gif') }}" >
            <a href="{{ route('home') }}">Home</a>
            
            <a href="{{ route('curiosita.index') }}">Curiosità</a>


            <a href="{{ route('minigioco') }}">Minigioco</a>
            <a href="{{ route('squadra.home') }}">Crea Squadra</a>
            
            @php
    $userId = Session::get('user_id');
@endphp

@if($userId)
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    
    </form>
@else
    <a href="{{ route('registrati') }}">Registrazione</a>
    <a href="{{ route('login') }}">Login</a>
@endif
@php
    $user = \App\Models\User::find(Session::get('user_id'));
@endphp
            <a href="{{ route('account') }}">
        <span>
        @if($user)
            {{ $user->name }}
        @else
            Account
        @endif
    </span>
    @php
        $user = \App\Models\User::find(Session::get('user_id'));
    @endphp

    @if($user && $user->profile_image)
        <img id="profileImage" src="{{ asset('storage/profile_images/' . $user->profile_image) }}" alt="Immagine Profilo">
    @else
        <img id="profileImage" src="{{ asset('immagini/default.jpg') }}" >
    @endif
</a>

            <img src="{{ asset('immagini/logohome.gif') }}" >
        </nav>
    </header>

    <div class="container">
        @yield('content')  
    </div>

    <footer>
<footer class="footer">
    <div class="footer-content">
        <p>&copy; {{ date('Y') }} Cardteca.</p>
        <p>Marco Greco - Ingegneria Informatica <br>
        Matricola: 1000019478</p>
        Sede: Acireale
        <p>Seguici su 
    <a href="https://www.instagram.com/holon_realm?utm_source=ig_web_button_share_sheet&igsh=MWpmYzU3YWN5OHd6OA==">Instagram</a> | 
    <a href="https://www.ebay.it/usr/holon_realm">Ebay</a> | 
    <a href="https://www.vinted.it/member/212792051">Vinted</a>
</p>
 

        <p>
            <a href="mailto:holonrealm1@gmail.com">Contattaci</a> 
            
        </p>
    </div>
</footer>
    </footer>

</body>
</html>
