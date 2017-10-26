<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CertificationController extends Controller
{
    public function test (){
        return \PDF::loadView('system/certificacao/model')
            ///Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
            ->setPaper('a4', 'landscape')->stream();

        //return view('system/certificacao/model');
    }


}
