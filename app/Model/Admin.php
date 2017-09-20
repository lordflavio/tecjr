<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admin";
    protected $fillable = [
        'id',
        'nome',
        'cargo',
        'face',
        'twitter',
        'gmail',
        'whatsapp',
        'img'
    ];
}
