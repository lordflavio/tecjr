<?php

namespace App\Http\Controllers\System;

use App\Model\curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Model\Admin;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::find( Auth::user()->id);
        $title = 'Tecjr Cursos';
        $cursos = curso::all();
        return view('system/cursos/cursos',compact('cursos','title','admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

            $title = 'Tecjr novo Cursos';
            return view('system/cursos/novo-curso',compact('title'));

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
                $n_date =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->data)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));

                $curso = new curso();
                $curso->nome = $request->nome;
                $curso->data = $request->data;
                $curso->horario = $request->horario;
                $curso->titulo = $request->titulo;
                $curso->discricao = $request->discricao;
                $curso->ministrante = $request->ministrante;
                $curso->img  = '/imagens/cursos/'.$n_nome.'-'.$n_date.'.'.$extencao;

                $curso->save();

                if( $img->move(public_path().'/imagens/cursos/',$n_nome.'-'.$n_date.'.'.$extencao)){
                    Session::flash('success','Novo curso registrado!');
                    return redirect(route('curso.index'));
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
        //
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

    public function delete($id){
        unlink(public_path().curso::find($id)->img);
        curso::destroy($id);

        Session::flash('warning','Curso Removido!');
        return redirect()->route('curso.index');
    }
}
