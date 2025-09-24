<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Squadra Pokémon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <script>
        const BASE_URL = "{{ url('/') }}/";
        const csrf_token = '{{ csrf_token() }}';
    </script>
    <script src="{{ url('js/squadra.js') }}" defer></script>

    
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            background-image: url("/immagini/rovine.jpg"); 
            background-size: cover;      
            background-position: center;  
            background-repeat: no-repeat; 
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h2, h3 {
            text-align: center;
            color: #222;
        }

        #search-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            gap: 10px;
        }

        #search-text {
            padding: 8px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        #search-btn {
            padding: 8px 16px;
            background-color: #ffcb05;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            color: #3b4cca;
        }

        #search-btn:hover {
            background-color: #f2b807;
        }

        #search_result, #team {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 16px;
            margin-top: 20px;
        }

        .pokemon-item {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            padding: 10px;
            text-align: center;
            width: 120px;
            transition: transform 0.2s;
            position: relative;
        }

        .pokemon-item:hover {
            transform: scale(1.05);
        }

        .pokemon-item img {
            width: 80px;
            height: 80px;
        }

        .pokemon-item .nome,
        .pokemon-item .tipo {
            display: block;
            width: 100%;
            text-align: center;
        }

        .pokemon-item .nome {
            font-weight: bold;
            text-transform: capitalize;
            margin-top: 5px;
        }

        .pokemon-item .tipo {
            font-size: 0.9em;
            color: #666;
        }

        .clickable {
            cursor: pointer;
        }

        .remove-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 16px;
            height: 16px;
            cursor: pointer;
        }
        .btn-home {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 240px;
  margin: 10px auto;  
  padding: 8px 16px;
  background-color: #ffcb05;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-weight: bold;
  color: #3b4cca;
}
.container {
    margin: 0 auto;
    
    width: 700px;
    background-color:rgb(255, 255, 255);
    border-radius: 15px;
    height: auto;
    padding: 15px;
  }

   @media (max-width: 600px) {
  .container {
    width: 95%;
    height: auto;
    padding: 15px;
  }

  #search-container {
    flex-direction: column;
    align-items: center;
  }

  #search-text {
    width: 100%;
    max-width: 300px;
  }

  #search-btn {
    width: 100%;
    max-width: 200px;
    margin-top: 10px;
  }

  #search_result, 
  #team {
    flex-direction: column;
    align-items: center;
  }

  .pokemon-item {
    width: 80%;
    max-width: 250px;
  }

  .pokemon-item img {
    width: 100px;
    height: 100px;
  }

  .btn-home {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 240px;
  margin: 10px auto;  
  padding: 8px 16px;
  background-color: #ffcb05;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-weight: bold;
  color: #3b4cca;
}

}

    </style>
</head>
<body>
    <div class="container">
        <h2>Crea la tua squadra Pokémon</h2>    
        <div id="search-container">
            <input id="search-text" type="text" placeholder="Cerca Pokémon per nome..." />
            <button id="search-btn">Cerca</button>
        </div>

        <div id="search_result"></div>

        <h3>La tua squadra (max 6)</h3>
        <div id="team"></div>

        
        <a href="{{ route('home') }}" class="btn-home" role="button">Torna alla Home</a>
    </div>
</body>
</html>

