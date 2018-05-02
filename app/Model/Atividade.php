<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Participate_has_Atividade;

class atividade extends Model
{
    protected $table = "atividades";
    protected $fillable = [
        'id',
        'area',
        'cordenacao',
        'palestrante',
        'convidados',
        'modalidade',
        'vagas',
        'horas',
        'titulo',
        'data',
        'horario',
        'local',
        'eventoId'
    ];

    public function check($id,$ev){
        $at = Participate_has_Atividade::where('eventosId','=',$ev)->where('atividadeId','=',$id)->get();
        return count($at);
    }

    public function getData ($data){

        $mes_extenso = array(
            'Jan' => 'Janeiro',
            'Feb' => 'Fevereiro',
            'Mar' => 'Marco',
            'Apr' => 'Abril',
            'May' => 'Maio',
            'Jun' => 'Junho',
            'Jul' => 'Julho',
            'Aug' => 'Agosto',
            'Nov' => 'Novembro',
            'Sep' => 'Setembro',
            'Oct' => 'Outubro',
            'Dec' => 'Dezembro'
        );

        $campo = "";

        $d =  date('d',strtotime($data));
        $mf =  date('M',strtotime($data));
        $m = $mes_extenso[$mf];
        $y =  date('Y',strtotime($data));

        $campo = $d." de ".$m. " de ".$y;

        return $campo;

    }

    public function getDiaSemana(){
        $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
        $mes_extenso = array(
            'Jan' => 'Janeiro',
            'Feb' => 'Fevereiro',
            'Mar' => 'Marco',
            'Apr' => 'Abril',
            'May' => 'Maio',
            'Jun' => 'Junho',
            'Jul' => 'Julho',
            'Aug' => 'Agosto',
            'Nov' => 'Novembro',
            'Sep' => 'Setembro',
            'Oct' => 'Outubro',
            'Dec' => 'Dezembro'
        );

        $data = date('Y-m-d');

        $diasemana_numero = date('w', strtotime($data));

       return $diasemana[$diasemana_numero].', '.date('d', strtotime($data)).' de '.$mes_extenso[date('M',strtotime($data))].' de '.date('Y',strtotime($data));
    }


}


