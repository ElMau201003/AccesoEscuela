<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
        'dni',
        'nombre',
        'edad',
        'zona',
        'internet',
        'nivel_socioeconomico',
    ];
}
