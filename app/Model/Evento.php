<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    protected $table = "eventos";
    protected $fillable = [
        'id',
        'nome',
        'valor_inscricao',
        'titulo',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'email',
        'fone',
        'descricao',
        'dateInicioIns',
        'dateFimIns',
        'dateInicioEx',
        'dateFimEx',
        'programacao',
        'descIns',
        'map',
        'banner',
        'img'
    ];


    public function getValue($v, $type){

        if($type < 7){
            $cust  =  (float) str_replace(".", "", $v->valor_inscricao);

            $newc = ($cust - ($cust * 0.04)) - 0.40;

            return $newc;
        }else{
            $cust  =  (float) str_replace(".", "", $v->valor_inscricao);

            return $cust;

        }

    }
}
