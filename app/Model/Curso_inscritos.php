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
            0 => 'Em espera',
            1 => 'Confirmado',
            2 => 'Negado',
            3 => '2º Via',
        ];
        
        return $A[$c];
    }

    public function getLabel($n){
        $b = [
            0 => 'btn-primary',
            1 => 'btn-success',
            2 => 'btn-danger',
        ];

        return $b[$n];
    }
}
