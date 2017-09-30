<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Curso_conteudo extends Model
{
    protected $table = "cursos";
    protected $fillable = [
        'cursosId',
        'conteudo'
    ];
}
