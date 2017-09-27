<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerOut extends Controller
{
    public function portifolio()
    {
        return view('/portifolio');
    }

    public function noticias()
    {
        return view('/noticias');
    }

    public function contato()
    {
        return view('/contato');
    }

    public function cursosEventos()
    {
        return view('/curso-evento');
    }

    public function curso()
    {
        return view('/curso');
    }


}
