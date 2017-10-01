<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Curso_conteudo extends Model
{
    protected $table = "curso_conteudo";
    protected $fillable = [
        'id',
        'cursosId',
        'conteudo'
    ];
}
