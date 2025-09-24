# Cardteca

Applicazione Laravel per creare e salvare squadre di 6 Pokémon. Progetto universitario / portfolio.

## Panoramica
Cardteca permette a un utente registrato di creare, modificare e salvare squadre composte da 6 carte. Il backend espone endpoint REST per la gestione delle squadre e integra la PokéAPI per recuperare immagini e dati delle carte.

## Funzionalità principali
- Registrazione / Login utenti
- Creazione, modifica e salvataggio di squadre (CRUD) tramite REST API
- Integrazione con PokéAPI per recupero immagini e dati
- Upload immagine profilo
- Frontend responsive (HTML/CSS/JS)

## Tecnologie
Laravel • PHP • MySQL • Blade • JavaScript • AJAX • Postman

## Requisiti
- PHP 8.x
- Composer
- MySQL (o MariaDB)
- Node.js (se usi la build degli assets)

## Installazione (locale)
```bash
git clone https://github.com/Madara247/Cardteca.git
cd Cardteca

# copia l'esempio .env e modifica le variabili
cp .env.example .env

# dipendenze PHP
composer install

# opzionale: dipendenze JS / build assets
npm install
npm run dev

# chiave app e migrazioni
php artisan key:generate
php artisan migrate --seed

# avvia
php artisan serve
