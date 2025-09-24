<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/log.css' )}}">
    <title>Registrazione</title>
</head>
<body>
    <div class="form">
<h1>Registrazione utente</h1>
@if (isset($error) && $error)
  <div class="alert alert-danger">
    {{ $error }}
  </div>
@endif

    @if (session('success'))
 <div>
    {{ session('success') }}
 </div>    
    @endif
    @if($errors -> any())
<ul>
    @foreach ($errors -> all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
    @endif

    <form action="{{ route('registrati') }}" method="POST" class="form-group" enctype="multipart/form-data">
        @csrf
        <div class="form-div">
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-div">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-div">
            <label for="age">Età</label>
            <input type="number" id="age" name="age" value="{{ old('age') }}" required>
        </div>

        <div class="form-div">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="form-div">
            <label for="password">Conferma password</label>
            <input type="password" id="confirm_password" name="confirm_password">
        </div>
        <div class="form-div">
        <label for="profile_image">Immagine profilo</label>
        <input type="file" name="profile_image" id="profile_image" accept="image/*">
        </div>
        <div class="checkbox-container">
            <label>
            <input type="checkbox" name="terms" required>
            <a href="{{ route("termini")}}">Termini e Condizioni</a>
            </label>
        </div>
    
        <button type="submit" class="form-button"> Registrati</button>
    </form>
        <div class="form-redirect">
        <a href="{{ route('login') }}">
            Hai già un account? Accedi qui
        </a>
        </div>
    </div>
</body>
</html>