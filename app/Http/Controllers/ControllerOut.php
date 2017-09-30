<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use App\Model\curso;
use App\Model\evento;
use App\Model\Noticias;
use App\Model\Patrocinio;
use Illuminate\Http\Request;

class ControllerOut extends Controller
{
    public function welcome()
    {
        $patrocinio = Patrocinio::all();
        $noticias = Noticias::all();
        $gestao = Admin::all();
        $cursos = curso::orderBy('id', 'desc')->get();
        $evento = evento::orderBy('id', 'desc')->get();;
        return view('/welcome',compact('patrocinio','noticias','gestao','cursos','evento'));
    }
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
