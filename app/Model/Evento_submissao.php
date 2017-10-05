<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Evento_submissao extends Model
{
    protected $table = "evento_submissao";
    protected $fillable = [
        'id',
        'eventoid',
        'descricao',
        'link'
    ];
}
