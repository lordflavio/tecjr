<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Participate_has_Evento extends Model
{
    protected $table = "participante_has_eventos";
    protected $fillable = [
        'participanteId',
        'eventosId',
        'custo',
        'status'

    ];
}
