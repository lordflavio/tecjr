<?php

namespace App\Http\Controllers\System;

use App\Model\Noticias;
use App\Model\Patrocinio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Model\Admin;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::find( Auth::user()->id);
        $title = 'Tecjr Admin';
        $patrocinio = Patrocinio::all();
        $noticias = Noticias::all();
        return view('system/home',compact('title','admin','patrocinio','noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/home');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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


    public function patrocinio(Request $request){

        $img = $request->file('propaganda');

        if(isset($img)){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }

            $n_date =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim(date('Y-m-d H:i:s'))), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));


            $patrocinio = new Patrocinio();
            $patrocinio->img  = '/imagens/patrocinio/patrocinio-'.$n_date.'.'.$extencao;

            $patrocinio->save();

            if( $img->move(public_path().'/imagens/patrocinio/','patrocinio-'.$n_date.'.'.$extencao)){
                Session::flash('success','Novo patrocinio registrado!');
                return redirect(route('home.index'));
            }else{
                Session::flash('warning','Problema no envio!');
                return back();
            }

        }else{
            Session::flash('info','Carregar uma imagem!');
            return back();
        }
    }

    public function deletePatrocinio($id)
    {
        unlink(public_path().Patrocinio::find($id)->img);
        Patrocinio::destroy($id);
        Session::flash('warning','Patrocinio Removido!');
        return redirect()->route('home.index');
    }

    public function baner(Request $request){

        $img = $request->file('banner');
        $caminho = $request->img;

        if(isset($img)){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }

            unlink(public_path().$caminho.'.'.$extencao);

             if( $img->move(public_path().'/imagens/baner/',$caminho.'.'.$extencao)){
                Session::flash('success','Novo patrocinio registrado!');
                return redirect(route('home.index'));
            }else{
                Session::flash('warning','Problema no envio!');
                return back();
            }

        }else{
            Session::flash('info','Carregar uma imagem!');
            return back();
        }
    }
    public function noticias(Request $request){

        $img = $request->file('img');


        if(isset($img)){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }

            $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->titulo)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));


            $noticia = new Noticias();
            $noticia->titulo = $request->titulo;
            $noticia->subtitulo = $request->subtitulo;
            $noticia->descricao = $request->discricao;
            $noticia->autor = $request->autor;
            $noticia->data = date('d/m/y');
            $noticia->img = '/imagens/noticias/'.$n_nome.'.'.$extencao;


            if( $img->move(public_path().'/imagens/noticias/',$n_nome.'.'.$extencao)){

                $noticia->save();

                Session::flash('success','Nova noticia registrada!');
                return redirect(route('home.index'));

            }else{
                Session::flash('warning','Problema no envio!');
                return back();
            }

        }else{
            Session::flash('info','Carregar uma imagem!');
            return back();
        }

    }

    public function deleteNoticia($id){
        unlink(public_path().Noticias::find($id)->img);
        Noticias::destroy($id);
        Session::flash('warning','Noticia Removido!');
        return redirect()->route('home.index');

    }


}
