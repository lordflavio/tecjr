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


}


