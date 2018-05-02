<?php

namespace App\Http\Controllers\System;

use App\Model\curso;
use App\Model\Curso_inscritos;
use App\Model\evento;
use App\Model\Evento_inscritos;
use App\Model\Noticias;
use App\Model\participante;
use App\Model\Patrocinio;
use App\Model\Transacoes;
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
            $ideal_size = getimagesize($img);
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }

//            if($ideal_size[0] != 760 && $ideal_size[1] != 400){
//                Session::flash('warning','Tamanho da imagem invalido!');
//                return back();
//            }

            $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->titulo)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));


            $noticia = new Noticias();
            $noticia->titulo = $request->titulo;
            $noticia->descricao = $request->discricao;
            $noticia->data = date('Y-m-d');
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

    public function folder (Request $request){

        $img = $request->file('folder');

        if(isset($img)){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }

            unlink(public_path().'/imagens/folder.'.$extencao);

            if( $img->move(public_path().'/imagens/','folder'.'.'.$extencao)){
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


    public function trasacoes (){

        $admin = Admin::find( Auth::user()->id);
        $title = 'Tecjr Admin';

        $dias = 7;

        $date1 = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));
        $date2 = date('Y-m-d');

        $trans = Transacoes::where('date','>=',$date1)->where('date','<=',$date2)->get();

       // dd($trans);
      //  dd($date2);

        $tr = array();

        for ($i = 0; $i < count($trans); $i++){
            $tr['part'][$i] = participante::where('id','=',$trans[$i]->user_id)->first();
            $tr['tr'][$i] = $trans[$i];

            $t = Evento_inscritos::where('transacaoId','=',$trans[$i]->id)->first();
            $t2 = Curso_inscritos::where('transacaoId','=',$trans[$i]->id)->first();

            if(isset($t)){
                $tr['cev'][$i] = evento::where('id','=',$t->eventosId)->first();
            }elseif (isset($t2)){
                $tr['cev'][$i] = curso::where('id','=',$t2->cursosId)->first();
            }

            $t = null;
            $t2 = null;


        }

        //dd($tr);

        return view('system/trasacoes',compact('admin','title','tr','dias'));
    }


    public function trasacoes2 (Request $request){

        $admin = Admin::find( Auth::user()->id);
        $title = 'Tecjr Admin';

        $dias = $request->dias;

        $date1 = date('Y-m-d', strtotime('-'.$request->dias.' days', strtotime(date('Y-m-d'))));
        $date2 = date('Y-m-d');

        $trans = Transacoes::where('date','>=',$date1)->where('date','<=',$date2)->get();

       // dd($trans);
      //  dd($date2);

        $tr = array();

        for ($i = 0; $i < count($trans); $i++){
            $tr['part'][$i] = participante::where('id','=',$trans[$i]->user_id)->first();
            $tr['tr'][$i] = $trans[$i];

            $t = Evento_inscritos::where('transacaoId','=',$trans[$i]->id)->first();
            $t2 = Curso_inscritos::where('transacaoId','=',$trans[$i]->id)->first();

            if(isset($t)){
                $tr['cev'][$i] = evento::where('id','=',$t->eventosId)->first();
            }elseif (isset($t2)){
                $tr['cev'][$i] = curso::where('id','=',$t2->cursosId)->first();
            }

            $t = null;
            $t2 = null;
        }

        //dd($tr);

        return view('system/trasacoes',compact('admin','title','tr','dias'));
    }


    public function trasacoesperiodo (Request $request){

        $admin = Admin::find( Auth::user()->id);
        $title = 'Tecjr Admin';

        //$dias = $request->dias;

        $dias = $request->dias;

        $date1 = date('Y-m-d', strtotime('-'.$request->dias.' days', strtotime(date('Y-m-d'))));
        $date2 = date('Y-m-d');

        $trans = Transacoes::whereBetween('date', [$date1, $date2])->get();

       //dd($trans);
      //  dd($date1);

        $tr = array();

        $total = 0;

        for ($i = 0; $i < count($trans); $i++){
            $tr['part'][$i] = participante::where('id','=',$trans[$i]->user_id)->first();
            $tr['tr'][$i] = $trans[$i];

            $t = Evento_inscritos::where('transacaoId','=',$trans[$i]->id)->first();
            $t2 = Curso_inscritos::where('transacaoId','=',$trans[$i]->id)->first();

            if(isset($t)){
                $tr['cev'][$i] = evento::where('id','=',$t->eventosId)->first();

                if($tr['tr'][$i]->payment_method < 7){
                    $cust  =  (float) str_replace(".", "", $tr['cev'][$i]->valor_inscricao);
                    $total += ($cust - ($cust * 0.04)) - 0.40;
                }else{
                    $total  +=  (float) str_replace(".", "", $tr['cev'][$i]->valor_inscricao);
                }


            }elseif (isset($t2)){
                $tr['cev'][$i] = curso::where('id','=',$t2->cursosId)->first();
                if($tr['tr'][$i]->payment_method < 7){
                    $cust  =  (float) str_replace(".", "",  $tr['cev'][$i]->valorInscricao);

                    $total += ($cust - ($cust * 0.04)) - 0.40;
                }else{
                    $cust  =  (float) str_replace(".", "",  $tr['cev'][$i]->valorInscricao);
                    $total += $cust;
                }
            }

            $t = null;
            $t2 = null;


        }

       // dd($date1);

        return \PDF::loadView('system/faturamento',compact('admin','title','tr','dias','total','date1','date2'))
            ///Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
            ->setPaper('a4','landscape')->stream();

        //return view('system/faturamento',compact('admin','title','tr','dias','total','date1','date2'));
    }




}
