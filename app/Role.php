<?php

namespace App;

use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
    protected $fillable = [
        'id','name', 'display_name', 'description',
    ];
}
