<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    protected $table = "eventos";
    protected $fillable = [
        'id',
        'nome',
        'dateInicioIns',
        'dateFimIns',
        'dateInicioEx',
        'dateFimEx',
        'status',
        'img'
    ];
}
