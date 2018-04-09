<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Participate_has_Atividade extends Model
{
    protected $table = "participante_has_atividades";
    protected $fillable = [
        'id',
        'participanteId',
        'eventosId',
        'atividadeId',
        'certificado'

    ];
}
