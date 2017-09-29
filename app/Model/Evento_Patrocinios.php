<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Evento_Patrocinios extends Model
{
    protected $table = "evento_patrocinio";
    protected $fillable = [
        'id',
        'eventoid',
        'img'
    ];
}
