function onTeamData(data)
{
    if (data.error) {
        alert("Errore: " + data.error);
        return;
    }
    updateTeam(data);
}


function onResponse(response)
{
    return response.json();
}

function addPokemon(event) {
    const div = event.currentTarget;
    const nome = div.dataset.nome;

    if (!nome) {
        alert("Errore: Pokémon senza nome");
        return;
    }

    fetch(BASE_URL + 'squadra/add/' + nome, {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': csrf_token,
    },
    credentials: 'same-origin',
    body: JSON.stringify({})
})
.then(onResponse)
.then(data => {
    console.log("Risposta addPokemon:", data);
    if (data.error) {
        alert(data.error);
        return;
    }
    updateTeam(data);
})
.catch(err => console.error("Errore aggiunta squadra:", err));

}




function removePokemon(event) {
    const pivot_id = event.currentTarget.dataset.pivot_id;
    fetch(BASE_URL + 'squadra/remove/' + pivot_id, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrf_token
        },
        credentials: 'same-origin'
    })
    .then(onResponse)
    .then(onTeamData)
    .catch(err => console.error("Errore rimozione squadra:", err));
}


function createPokemonItem(pokemon, clickable, removable)
{
    const poke_div = document.createElement('div');
    poke_div.dataset.nome = pokemon.nome;
    poke_div.dataset.id = pokemon.id;
    poke_div.classList.add('pokemon-item');

    const poke_img = document.createElement('img');
    poke_img.src = pokemon.sprite_url;
    poke_div.append(poke_img);

    const nome_span = document.createElement('span');
    nome_span.classList.add('nome');
    nome_span.textContent = pokemon.nome;
    poke_div.append(nome_span);

    const tipo_span = document.createElement('span');
    tipo_span.classList.add('tipo');
    tipo_span.textContent = pokemon.tipo;
    poke_div.append(tipo_span);

    if(clickable)
    {
        poke_div.classList.add('clickable');
        poke_div.addEventListener('click', addPokemon);
    }
   if(removable)
{
    const remove_btn = document.createElement('span');
    remove_btn.textContent = '✖️';
    remove_btn.classList.add('remove-btn', 'clickable');
    remove_btn.dataset.pivot_id = pokemon.pivot_id;
    remove_btn.addEventListener('click', removePokemon);
    poke_div.append(remove_btn);
}
    return poke_div;
}

function updateTeam(data)
{
    const team_div = document.querySelector('#team');
    team_div.innerHTML = '';

    
    if (!Array.isArray(data)) {
        console.error("updateTeam: data non è un array:", data);

        if (data.error) {
            team_div.textContent = 'Errore: ' + data.error;
        } else {
            team_div.textContent = 'Errore sconosciuto nel caricamento della squadra';
        }

        return;
    }

    // Se array vuoto
    if (data.length == 0) {
        team_div.textContent = 'Nessun Pokémon nella squadra';
        return;
    }

    // Mostra la squadra
    for (const pokemon of data) {
        team_div.append(createPokemonItem(pokemon, false, true));
    }
}



function onSearchData(data)
{
    const result_div = document.querySelector('#search_result');
    result_div.innerHTML = '';
    if(data.length == 0)
    {
        result_div.textContent = 'Nessun Pokémon trovato';
        return;
    }
    for(pokemon of data)
    {
        result_div.append(createPokemonItem(pokemon, true, false));
    }
}

function searchResponse(response)
{
    return response.json();
}

function search(event) {
    const search_text = document.querySelector('#search-text').value.trim();
    if(search_text === '') {
        alert("Inserisci un nome di Pokémon.");
        return;
    }

    fetch(`https://pokeapi.co/api/v2/pokemon/${search_text}`)
    .then(response => {
        if (!response.ok) throw new Error('Pokémon non trovato');
        return response.json();
    })
    .then(data => {
        
        const pokemon = {
            nome: data.name,
            id: data.id,
            sprite_url: data.sprites.front_default,
            tipo: data.types.map(t => t.type.name).join(', ')
        };
        onSearchData([pokemon]); 
    })
    .catch(error => {
        console.error(error);
        const result_div = document.querySelector('#search_result');
        result_div.innerHTML = 'Nessun Pokémon trovato';
    });
}


function onTeamContentData(data)
{
    updateTeam(data);
}

function onTeamContentResponse(response)
{
    return response.json();
}

// Carica squadra all'avvio
fetch(BASE_URL + 'squadra/list').then(onTeamContentResponse).then(onTeamContentData);

// Eventi
document.querySelector('#search-btn').addEventListener('click', search);
