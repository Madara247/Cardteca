<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Utente</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("/immagini/rovine.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 60px auto;
            padding: 30px;
            background-color:rgb(255, 247, 237);
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }

        h1, h2 {
            color: #2e3d49;
            margin-bottom: 20px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 40px;
        }

        .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-size: cover; 
            border: 2px solid #067524;
        }

        .grid-squadra {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .pokemon-item {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            width: 120px;
            transition: transform 0.2s ease;
        }

        .pokemon-item:hover {
            transform: scale(1.05);
        }

        .pokemon-item img {
            width: 96px;
            height: 96px;
        }

        .curiosita-preferite {
            margin-top: 50px;
        }
        .curiosita-item:hover{
            transform: scale(1.02);
        }

        .curiosita-item {
            display: flex;
            align-items: center;
            gap: 15px;
            border: 1px solid #ccc;
            background: #fff;
            border-radius: 10px;
            padding: 12px 18px;
            margin-bottom: 15px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .curiosita-item img {
            width: 80px;
            height: auto;
            border-radius: 8px;
            background-image: cover;
        }

        .curiosita-item h3 {
            margin: 0;
            color: #067524;
        }
        .button {
           display: block;
            width: 180px;
            margin: 30px auto 50px;
            padding: 12px 0;
            text-align: center;
            background-color: #3b4cca;
            color: white;
            font-weight: bold;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s;
            
        }
        .login-mobile{
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
        }
        .login-mobile a {
    display: inline-block;
    margin: 5px 8px;
    
    background: rgba(255,255,255,0.85);
    color: #2a3797;
    padding: 6px 10px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
    font-size: 0.9rem;
  }

.button:hover {
    background-color: #2a3797;
}
@media (max-width: 600px) {
  body {
    padding: 10px;
  }

  .container {
    margin: 30px auto;
    padding: 20px;
    border-radius: 12px;
  }

  .profile {
    flex-direction: column;
    display: flex;
    
  }
  h1{
    text-align: center;
  }
  .profile p strong{
    text-align: center;
  }

  .profile img {
    width: 100px;
    height: 100px;
  }

  .grid-squadra {

    gap: 10px;
  }

  .pokemon-item {
    width: 100px;
    padding: 15px;
    margin:auto;
  }

  .pokemon-item img {
    width: 80px;
    height: 80px;
  }

  .curiosita-item {
    flex-direction: column;
    text-align: center;
    gap: 10px;
  }

  .curiosita-item img {
    width: 120px;
    max-width: 200px;
  }

  .button {
    width: 160px;
    padding: 10px 0;
    margin: 20px auto 40px;
  }
  h2, p{
    height: 40%;
    width: 40%;
    background-image: cover;
  }
   body {
    background: url("/immagini/rovine.jpg") center/cover no-repeat;
  }
  .login-mobile {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    height: 70vh; 
    
    color: #fff;
    text-align: center;

    padding: 20px;
    box-sizing: border-box;
  }

  .login-mobile h2 {
    font-size: 1.2rem;   
    margin-bottom: 10px;
  }

  .login-mobile p {
    font-size: 0.9rem;   
  }

  .login-mobile a {
    display: inline-block;
    margin: 5px 8px;
    background: rgba(255,255,255,0.85);
    color: #2a3797;
    padding: 6px 10px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
    font-size: 0.9rem;
  }

  .login-mobile a:hover {
    background: #fff;
  }
}

    </style>
</head>
<body>
    <div class="container">
        
    <a href="{{ route('home') }}"class="button">← Torna alla home</a>

        
    
        @if(Session::has('user_id'))
            <h1>Il tuo account</h1>
            <div class="profile">
                @if($user && $user->profile_image)
        <img id="profileImage" src="{{ asset('storage/profile_images/' . $user->profile_image) }}" alt="Immagine Profilo">
    @else
        <img id="profileImage" src="{{ asset('immagini/default.jpg') }}" >
    @endif
                <div>
                    <p><strong>Nome:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Età:</strong> {{ $user->age ?? 'Non specificata' }}</p>
                </div>
            </div>

            <h2>Squadra Pokémon</h2>

            @if($squadra->count() > 0)
                <div class="grid-squadra">
                    @foreach ($squadra as $pokemon)
                        <div class="pokemon-item">
                            <img src="{{ $pokemon->sprite_url }}" alt="{{ $pokemon->nome }}">
                            <p><strong>{{ ucfirst($pokemon->nome) }}</strong></p>
                            <p>Tipo: {{ ucfirst($pokemon->tipo) }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Nessun Pokémon nella tua squadra.</p>
            @endif

@if(isset($curiositaPreferite) && count($curiositaPreferite) > 0)
    <div class="curiosita-preferite">
        <h2>Curiosità Preferite</h2>
        @foreach($curiositaPreferite as $curio)
            <div class="curiosita-item" data-id="{{ $curio->id }}">
                <img src="{{ $curio->immagine }}" alt="{{ $curio->titolo }}">
                <h3>{{ $curio->titolo }}</h3>
            </div>
        @endforeach
    </div>
@else
    <p class="curiosita-preferite"><em>Non hai ancora aggiunto curiosità ai preferiti.</em></p>
@endif


</div>
        @else
        <div class="login-mobile">
  <h2>Accedi o registrati per visualizzare questa pagina</h2>
  <p><a href="{{ route('login') }}">Accedi</a> oppure <a href="{{ route('registrati') }}">Registrati</a></p>
</div>
   
        @endif
    
</body>
</html>

