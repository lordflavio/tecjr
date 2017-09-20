<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Participate_has_Curso extends Model
{
    protected $table = "participante_has_cursos";
    protected $fillable = [
        'participanteId',
        'cursosId',
        'custo',
        'status'

    ];
}
