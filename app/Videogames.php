<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videogames extends Model
{
    protected $fillable = [
        'nome', 'descrizione', 'img'
    ];
}
