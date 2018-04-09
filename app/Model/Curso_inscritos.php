<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Curso_inscritos extends Model
{
   protected $table = "curso_inscritos";
    protected $fillable = [
        'id',
        'participanteId',
        'cursosId',
        'transacaoId',
        'certificado'

    ];
    
    public function getCertificado($c)
    {
        $A = [
            1 => 'Confirmado',
            2 => 'Negado',
        ];
        
        return $A[$c];
    }
}
