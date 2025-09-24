<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/log.css' )}}">
    <title>Login</title>
</head>
<body>
    <div class="form">
<h1>Login</h1>
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


    <form action="{{ route('login') }}" method="POST" class="form-group">
        @csrf
        <div class="form-div">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-div">
            <label for="password">password</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit" class="form-button"> Login</button>
    </form>
    <div class="form-redirect">
        <p>Non ti sei ancora registrato? clicca qui sotto</p>
        <a href="{{ route('registrati') }}">
            Registrati
        </a>
    </div>
  </div>  
</body>
</html>