<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Evento_inscritos extends Model
{
   protected $table = "eventos_inscritos";
    protected $fillable = [
        'id',
        'participanteId',
        'eventosId',
        'transacaoId',
        'status'

    ];
}
