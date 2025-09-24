<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preferito extends Model
{
    
    protected $table = 'preferito';
    public $timestamps = false;

  
    protected $fillable = [
        'id_utente',
        'id_articolo',
    ];

    //relazione con la tabella delle curiosità
    public function curiosita()
    {
        return $this->belongsTo(Curiosita::class, 'id_articolo');
    }

    //relazione con la tabella utenti
    public function user()
    {
        return $this->belongsTo(User::class, 'id_utente');
    }
}
