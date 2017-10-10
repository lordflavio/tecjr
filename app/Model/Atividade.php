<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class atividade extends Model
{
    protected $table = "atividades";
    protected $fillable = [
        'id',
        'area',
        'cordenacao',
        'palestrante',
        'convidados',
        'modalidade',
        'titulo',
        'data',
        'horario',
        'local',
        'eventoId'
    ];
}
