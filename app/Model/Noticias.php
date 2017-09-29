<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $table = "noticias";
    protected $fillable = [
        'id',
        'titulo',
        'subtitulo',
        'descricao',
        'autor',
        'data',
        'img'
    ];
}
