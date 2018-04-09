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
        'situacao',
        'inscricoes',
        'valorInscricao',
        'horario',
        'titulo',
        'duracao',
        'descricao',
        'ministrante',
        'publicoAlvo',
        'preRequisitos',
        'objetivo',
        'img'
    ];
}
