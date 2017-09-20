<?php

namespace App\Http\Controllers\System;

use App\Model\atividade;
use App\Model\evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Model\Admin;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::find( Auth::user()->id);
        $title = 'Tecjr Eventos';
        $eventos = evento::all();
        return view('system/eventos/eventos',compact('title','eventos','admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system/eventos/novo-evento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->file('img');

        if(isset($img)){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }
            $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->nome)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));
            $n_date =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->dateInicioEx)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));

            $evento = new evento();

            $evento->nome = $request->nome;
            $evento->dateInicioIns = $request->dateInicioIns;
            $evento->dateFimIns = $request->dateFimIns;
            $evento->dateInicioEx = $request->dateInicioEx;
            $evento->dateFimEx = $request->dateFimEx;
            $evento->status = $request->status;
            $evento->img  = '/imagens/eventos/'.$n_nome.'-'.$n_date.'.'.$extencao;

            $evento->save();

            if( $img->move(public_path().'/imagens/eventos/',$n_nome.'-'.$n_date.'.'.$extencao)){
                Session::flash('success','Novo evento registro!');
                return redirect(route('evento.index'));
            }else{
                Session::flash('warning','Problema no cadastro!');
                return back();
            }

        }else{
            Session::flash('info','Carregar uma imagem!');
            return back();
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
        $admin = Admin::find( Auth::user()->id);
        $atividades = atividade::all()->where('eventoId', '=', $id);
        $evento = evento::find($id);
        $title = 'Tecjr Eventos: ' . $evento->nome;
        return view('system/eventos/eventos-atividades', compact('atividades', 'evento', 'title','admin'));
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
        //
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

    public function ativa(Request $request,$id){

        $even = evento::find($id);
        $even->status= "true";
        if($request->novaData == "new"){
            $even->dateInicioIns = $request->dateInicioIns;
            $even->dateFimIns = $request->dateFimIns;
        }
        $even->save();
        Session::flash('info','Inscrições Abertas!');
        return redirect()->route('evento.show',$id);
    }

    public function delete($id)
    {
        unlink(public_path().evento::find($id)->img);
        evento::destroy($id);

        Session::flash('warning','Evento Removido!');
        return redirect()->route('evento.index');
    }
}
