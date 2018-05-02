<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Participate_has_Atividade extends Model
{
    protected $table = "participante_has_atividades";
    protected $fillable = [
        'participanteId',
        'eventosId',
        'atividadeId',
        'certificado'

    ];

    public function verifica($id){

        $at = Participate_has_Atividade::where('participanteId','=',auth()->user()->id)->where('id','=',$id)->get()->first();

        $array = array();

        if(isset($at)){
            $array['link'] = '#';
            $array['btn'] = 'disabled';
        }else{
            $array['link'] = '/perfil-user/eventos-minhas-atividades/{{$ativ[$i]->id}}/{{$ativ[$i]->eventoId}}';
            $array['btn'] = '';
        }

        //dd($array);

        return $array;
    }

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


