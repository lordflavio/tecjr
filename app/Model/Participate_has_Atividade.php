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
}


