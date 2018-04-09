<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class participante extends Model
{
    protected $table = "participante";
    protected $fillable = [
                            'nome',
                            'sexo',
                            'pais',
                            'cpf',
                            'celular',
                            'telefone',
                            'area_cod',
                            'cep',
                            'endereco',
                            'numero',
                            'cidade',
                            'estado',
                            'bairro',
                            'formacao',
                            'instituicao',
                            'area_formacao',
                            'subarea',
                            'img',
                            'id'
                         
                        ];
}
