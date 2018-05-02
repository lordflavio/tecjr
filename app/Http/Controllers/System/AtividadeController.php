<?php

namespace App\Http\Controllers\System;

use App\Model\atividade;
use App\Model\evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::find( Auth::user()->id);
        $title = 'Tecjr Pefil';
       return view('system/eventos/eventos-atividades'.compact('$admin','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//            atividade::create($request->all());

           $atv = new atividade();
           $atv->eventoId = $request->eventoId;
           $atv->titulo = $request->titulo;
           $atv->data = $request->data;
           $atv->horario = $request->horario;
           $atv->local = $request->local;
           $atv->vagas = $request->vagas;
           $atv->horas = $request->horas;


        if(isset($request->area)){
            $atv->area = $request->area;
        }else{
            $atv->area = "";
        }

        if(isset($request->modalidade)){
            $atv->modalidade = $request->modalidade;
        }else{
            $atv->modalidade = "";
        }

        if(isset($request->palestrante)){
            $atv->palestrante = $request->palestrante;
        }else{
            $atv->palestrante = "";
        }

        if(isset($request->cordenacao)){
            $atv->cordenacao = $request->cordenacao;
        }else{
            $atv->cordenacao = "";
        }

        if(isset($request->convidados)){
            $atv->convidados = $request->convidados;
        }else{
            $atv->convidados = "";
        }


           if($atv->save()){
               Session::flash('success','Nova Atividade registrada!');
               return redirect()->route('evento.show',$atv->eventoId);
           }else{
               Session::flash('warning','Problema no registro');
               return redirect()->route('evento.show',$atv->eventoId);
           }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $atv = atividade::find($id);

        $atv->titulo = $request->titulo;
        $atv->horario = $request->horario;
        $atv->local = $request->local;
        $atv->vagas = $request->vagas;
        $atv->horas = $request->horas;


        if(isset($request->data)){
            $atv->data = $request->data;
        }
        if(isset($request->area)){
            $atv->area = $request->area;
        }else{
            $atv->area = "";
        }

        if(isset($request->modalidade)){
            $atv->modalidade = $request->modalidade;
        }else{
            $atv->modalidade = "";
        }

        if(isset($request->palestrante)){
            $atv->palestrante = $request->palestrante;
        }else{
            $atv->palestrante = "";
        }

        if(isset($request->cordenacao)){
            $atv->cordenacao = $request->cordenacao;
        }else{
            $atv->cordenacao = "";
        }

        if(isset($request->convidados)){
            $atv->convidados = $request->convidados;
        }else{
            $atv->convidados = "";
        }


        if($atv->save()){
            Session::flash('update','Atividade Atualizada!');
            return redirect()->route('evento.show',$atv->eventoId);
        }else{
            Session::flash('warning','Atividade Atualizada!');
            return redirect()->route('evento.show',$atv->eventoId);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delete($id,$id2){
        atividade::destroy($id);
        Session::flash('warning','Atividade Removida!');
        return redirect()->route('evento.show',$id2);
    }
}
