<?php

namespace App\Http\Controllers\System;

use App\Model\atividade;
use App\Model\curso;
use App\Model\Curso_inscritos;
use App\Model\evento;
use App\Model\Participate_has_Atividade;
use Illuminate\Support\Facades\Session;
use App\Model\participante;
use App\User;
use App\Http\Controllers\Controller;


class CertificationController extends Controller
{
    public function test (){
        return \PDF::loadView('system/certificacao/model')
            ///Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
            ->setPaper('a4', 'landscape')->stream();

        //return view('system/certificacao/model');
    }

    public function certificadoCurso ($busca){

        $curso = curso::where('nome','=',$busca)->first();

        $part = participante::find(auth()->user()->id);

        $crf = Curso_inscritos::where('cursosId','=',$curso->id)->where('participanteId','=',auth()->user()->id)->first();

        $crf->certificado = 3;
        $crf->save();

        return \PDF::loadView('system/certificacao/certificado-curso',compact('curso','part'))->setPaper('a4', 'landscape')->download('Certificado '.$curso->titulo.'.pdf');
    }

    public function certificadoAtividade ($busca, $id){

        $evento = evento::where('nome','=',$busca)->first();

        $part = participante::find(auth()->user()->id);

        $atv = atividade::find($id);

        $ativ = Participate_has_Atividade::where('participanteId','=',auth()->user()->id)->where('atividadeId','=',$id)->first();;

        $ativ->certificado = 3;
        $ativ->save();

        return \PDF::loadView('system/certificacao/certificado-atividade',compact('evento','part','atv'))->setPaper('a4', 'landscape')->download('Certificado '.$atv->titulo.'.pdf');
    }

    public function lista ($id){

        $p =  Participate_has_Atividade::where('atividadeId','=',$id)->get();

        $a = atividade::find($id);

        $e = evento::find($a->eventoId);

        $pa = array();

        for ($i = 0; $i < count($p); $i++){
            $pa[$i] = participante::find($p[$i]->participanteId);
        }

        return \PDF::loadView('system/atividade-lista',compact('pa','a','e'))
            ///Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
            ->download('Lista de Participantes '.$a->titulo.'.pdf' );

       // return view('system/atividade-lista');
    }





}
