<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Evento_palestrante extends Model
{
    protected $table = "evento_palestrante";
    protected $fillable = [
        'id',
        'eventoid',
        'nome',
        'atividade',
        'formacao',
        'img',
        'lattes'
    ];
}
