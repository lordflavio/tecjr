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
        'horario',
        'titulo',
        'discricao',
        'ministrante',
        'img'
    ];
}
