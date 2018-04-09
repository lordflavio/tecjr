<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\participante;
use App\Model\Noticias;
use App\Model\Patrocinio;
use App\Model\Admin;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::find( Auth::user()->id);
        $participant = participante::find(Auth::user()->id);
        $title = 'Tecjr Admin';
        $patrocinio = Patrocinio::all();
        $noticias = Noticias::all();
        if(!isset($admin->id)){
            
            if ($participant) {

                if ($participant->nome == "" ||
                        $participant->cpf == "" ||
                        $participant->pais == "" ||
                        $participant->telefone == "" ||
                        $participant->area_cod == "" ||
                        $participant->celular == "" ||
                        $participant->cep == "" ||
                        $participant->endereco == "" ||
                        $participant->numero == 0 ||
                        $participant->cidade == "" ||
                        $participant->estado == "" ||
                        $participant->instituicao == "") {

                    $st = 1;
                    $desc = "Perfil Usuario";
                    $key = "";
                    $templete = 0;
                    
                    return view('user/perfil', compact('title', 'participant', 'desc', 'key', 'title', 'templete', 'st'));
                } else {
                    return redirect('/');
                }
            }
            
        }else{
            return view('system/home',compact('title','admin','patrocinio','noticias'));
        }
    }
}
