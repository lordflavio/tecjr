<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CertificationController extends Controller
{
    public function test (){
        return view('system/certificacao/model');
    }
}
