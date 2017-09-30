<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    protected $table = "cursos";
    protected $fillable = [
        'id',
        'nome',
        'data',
        'valorInscricao',
        'horario',
        'titulo',
        'duracao',
        'discricao',
        'ministrante',
        'publicoAlvo',
        'preRequisitos',
        'objetivo',
        'img'
    ];
}
