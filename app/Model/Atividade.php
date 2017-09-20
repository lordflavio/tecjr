<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class atividade extends Model
{
    protected $table = "atividades";
    protected $fillable = [
        'id',
        'area',
        'categoria',
        'resumo',
        'titulo',
        'data',
        'horario',
        'img',
        'eventoId'
    ];
}
