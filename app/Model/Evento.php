<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    protected $table = "eventos";
    protected $fillable = [
        'id',
        'nome',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'email',
        'fone',
        'sobre',
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
}
