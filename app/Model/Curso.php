<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    protected $table = "cursos";
    protected $fillable = [
        'id',
        'nome',
        'data',
        'situacao',
        'inscricoes',
        'valorInscricao',
        'horario',
        'titulo',
        'duracao',
        'descricao',
        'ministrante',
        'publicoAlvo',
        'preRequisitos',
        'objetivo',
        'img'
    ];


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

    public function getValue($v, $type){

        if($type < 7){
            $cust  =  (float) str_replace(".", "", $v->valorInscricao);

            $newc = ($cust - ($cust * 0.04)) - 0.40;

            return $newc;
        }else{
            $cust  =  (float) str_replace(".", "", $v->valorInscricao);
            return $cust;
        }

    }
}
