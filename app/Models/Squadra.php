<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pokemon;
use App\Models\User;
class Squadra extends Model
{
    protected $table = 'squadra'; 

    protected $fillable = [
        'user_id',
        'pokemon_id',
    ];

    
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

   
    public function pokemon()
    {
        return $this->belongsTo(Pokemon::class);
    }
}