<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Curiosità Pokémon</title>
    <link rel="stylesheet" href="{{ asset('css/curiosita.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="utente-id" content="{{ $idUtente }}">
</head>
<body>

    <h1>Curiosità sulle carte Pokémon</h1>

    <div id="contenitore">
        @foreach($curiosita as $cur)
            @php
                $salvato = in_array($cur['id'], $preferitiUtente);
            @endphp
            <div class="curiosita">
                <img src="{{ $cur['immagine'] ?? '/images/default.png' }}" alt="{{ $cur['titolo'] }}">
                <div class="testo">
                    <h2>{{ $cur['titolo'] }}</h2>
                    <div>{!! $cur['descrizione'] !!}</div>
                </div>
                @if (Session::has('user_id'))
                    <div class="cuore {{ $salvato ? 'salvato' : '' }}"
                         data-id="{{ $cur['id'] }}"
                         title="{{ $salvato ? 'Rimuovi dai preferiti' : 'Aggiungi ai preferiti' }}">
                        {!! $salvato ? '&#9829;' : '&#9825;' !!}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <a href="{{ route('home') }}" class="btn-home">Torna alla home</a>

    <script>
        const token = document.querySelector('meta[name="csrf-token"]').content;
        const utenteId  = document.querySelector('meta[name="utente-id"]').content;

        document.getElementById('contenitore').addEventListener('click', function(e) {
            if (!e.target.classList.contains('cuore')) return;

            const cuore = e.target;
            const idArticolo = cuore.dataset.id;

            fetch("{{ route('curiosita.toggle') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    id_utente: utenteId,
                    id_articolo: idArticolo
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'aggiunto') {
                    cuore.classList.add('salvato');
                    cuore.innerHTML = '&#9829;';
                    cuore.title = 'Rimuovi dai preferiti';
                } else if (data.status === 'rimosso') {
                    cuore.classList.remove('salvato');
                    cuore.innerHTML = '&#9825;';
                    cuore.title = 'Aggiungi ai preferiti';
                }
            })
            .catch(err => {
                console.error('Errore nella richiesta:', err);
                alert('Errore nella richiesta');
            });
        });
    </script>


</body>
</html>
