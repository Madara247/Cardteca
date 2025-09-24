<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curiosita extends Model
{
    public $timestamps = false;
    protected $table = 'curiosita';

    protected $fillable = [
        'id',
        'titolo'
    ];

    public function preferiti()
    {
        return $this->hasMany(Preferito::class, 'id_articolo');
    }
}
