<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Patrocinio extends Model
{
    protected $table = "patrocinio";
    protected $fillable = [
        'id',
        'img'
    ];
}
