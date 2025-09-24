<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Squadra;     
class Pokemon extends Model
{
    

    protected $fillable = [
        'nome',
        'sprite_url',
        'tipo',
    ];

    
    public function squadre()
    {
        return $this->hasMany(Squadra::class);
    }
}