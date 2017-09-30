<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    protected $table = "cursos";
    protected $fillable = [
        'id',
        'data',
        'valorInscricao',
        'horario',
        'titulo',
        'duracao',
        'discricao',
        'ministrante',
        'img'
    ];
}
