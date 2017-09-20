<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class participante extends Model
{
    protected $table = "participante";
    protected $fillable = [
        'nome',
        'cpf',
        'curso',
        'universidade',
        'periodo',
        ''
    ];
}
