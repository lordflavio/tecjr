<?php

namespace App\Http\Controllers\System;

use App\Model\atividade;
use App\Model\evento;
use App\Model\Participate_has_Atividade;
use App\User;
use App\Model\participante;
use App\Model\Evento_inscritos;
use App\Model\Evento_palestrante;
use App\Model\Evento_Patrocinios;
use App\Model\Evento_submissao;
use App\Model\Patrocinio;
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
        $admin = Admin::find( Auth::user()->id);
        $title = 'Tecjr Eventos';
        return view('system/eventos/novo-evento',compact('admin','title'));
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

            $evento->nome = $n_nome;
            $evento->titulo = $request->nome;
            $evento->valor_inscricao = $request->valorInscricao;
            $evento->endereco = $request->endereco;
            $evento->numero = $request->numero;
            $evento->bairro = $request->bairro;
            $evento->cidade = $request->cidade;
            $evento->estado = $request->estado;
            $evento->cep = $request->cep;
            $evento->email = $request->email;
            $evento->fone = $request->fone;
            $evento->descricao = $request->sobre;
            $evento->descIns = $request->descIns;
            $evento->map = $request->map;
            $evento->programacao = "";
            $evento->banner = "";
            $evento->dateInicioIns = $request->dateInicioIns;
            $evento->dateFimIns = $request->dateFimIns;
            $evento->dateInicioEx = $request->dateInicioEx;
            $evento->dateFimEx = $request->dateFimEx;
            $evento->img  = '/imagens/eventos/'.$n_nome.'-'.$n_date.'.'.$extencao;

            if( $img->move('./imagens/eventos/',$n_nome.'-'.$n_date.'.'.$extencao)){

                $evento->save();

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
        $submissao = Evento_submissao::all()->where('eventoid','=',$id);
        $patrocinio = Evento_Patrocinios::all()->where('eventoid','=',$id);
        $palestrante = Evento_palestrante::all()->where('eventoid','=',$id);

        $part = Evento_inscritos::where('eventosId','=',$evento->id)->get();

        $participantes = array();
//        $participantes['part'];
//        $participantes['user'];

        for($i = 0; $i < count($part); $i++){
            $participantes['part'][$i] = Participante::where('id','=',$part[$i]->participanteId)->get()->first();
            $participantes['crf'][$i] = $part[$i];
            $participantes['user'][$i] = User::where('id','=',$part[$i]->participanteId)->get()->first();
        }

        $title = 'Tecjr Eventos: ' . $evento->nome;
        return view('system/eventos/eventos-atividades', compact('atividades', 'evento', 'title','admin','patrocinio','submissao','palestrante','participantes'));
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
        $img = $request->file('img');

        $evento = evento::find($id);

        $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->nome)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));

        $evento->nome = $n_nome;
        $evento->titulo = $request->nome;
        $evento->valor_inscricao = $request->valorInscricao;
        $evento->endereco = $request->endereco;
        $evento->numero = $request->numero;
        $evento->bairro = $request->bairro;
        $evento->cidade = $request->cidade;
        $evento->estado = $request->estado;
        $evento->cep = $request->cep;
        $evento->email = $request->email;
        $evento->fone = $request->fone;
        $evento->sobre = $request->sobre;
        $evento->descIns = $request->descIns;
        $evento->map = $request->map;

        if(isset($request->dateInicioIns)){
            $evento->dateInicioIns = $request->dateInicioIns;

        }
        if(isset($request->dateFimIns)){
            $evento->dateFimIns = $request->dateFimIns;

        }
        if(isset($request->dateInicioEx)){
            $evento->dateInicioEx = $request->dateInicioEx;

        }
        if(isset($request->dateFimEx)){
            $evento->dateFimEx = $request->dateFimEx;

        }

        if(isset($img)){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }

            $n_date =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($evento->dateInicioEx)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));

            unlink(public_path().$evento->img);

            $evento->img  = '/imagens/eventos/'.$n_nome.'-'.$n_date.'.'.$extencao;

            if( $img->move('./imagens/eventos/',$n_nome.'-'.$n_date.'.'.$extencao)){

                $evento->save();

                Session::flash('update','Evento Atualizado');
                return redirect(route('evento.show',$id));
            }else{
                Session::flash('warning','Problema no cadastro!');
                return back();
            }

        }else{
            $evento->save();
            Session::flash('update','Evento Atualizado');
            return redirect(route('evento.show',$id));
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

//    public function ativa(Request $request,$id){
//
//        $even = evento::find($id);
//        $even->status= "true";
//        if($request->novaData == "new"){
//            $even->dateInicioIns = $request->dateInicioIns;
//            $even->dateFimIns = $request->dateFimIns;
//        }
//        $even->save();
//        Session::flash('info','Inscrições Abertas!');
//        return redirect()->route('evento.show',$id);
//    }

    public function delete($id)
    {
        unlink('.'.evento::find($id)->img);
        evento::destroy($id);

        Session::flash('warning','Evento Removido!');
        return redirect()->route('evento.index');
    }

    public function submissao(Request $request,$id)
    {

        $sub = new Evento_submissao();
        $sub->link = $request->link;
        $sub->descricao = $request->resumo;
        $sub->eventoid = $id;

        $sub->save();

        Session::flash('success','Submissão  Ativada!');
        return redirect()->route('evento.show',$id);
//      return back();
    }

    public function patrocinio(Request $request,$id){

        $img = $request->img;

        if(isset($img)){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }

            $cont = Evento_Patrocinios::all();

            $pat = new Evento_Patrocinios();
            $pat->eventoid = $id;


            $pat->img  = '/imagens/eventos/patrocinios/'.(count($cont)+ 1).'-'.$id.'.'.$extencao;

            if( $img->move('./imagens/eventos/patrocinios/',(count($cont)+ 1).'-'.$id.'.'.$extencao)){
                 $pat->save();
                Session::flash('success','Patrocinio Registrado!');
                return redirect(route('evento.show',$id));
            }else{
                Session::flash('warning','Problema no Registro!');
                return back();
            }

        }else{
            Session::flash('info','Carregar uma imagem!');
            return back();
        }

    }

    public function palestrante(Request $request,$id){

        $img = $request->img;

        if(isset($img)){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }

            $in = count(Evento_palestrante::all()) + 1;

            $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->nome)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));

            $pal = new Evento_palestrante();
            $pal->eventoid = $id;
            $pal->nome = $request->nome;
            $pal->atividade = $request->atividade;
            $pal->formacao = $request->formacao;
            $pal->lattes = $request->lattes;


            $pal->img  = '/imagens/eventos/palestrantes/'.$n_nome.'-'.$id.'-'.$in.'.'.$extencao;

            if( $img->move(public_path().'/imagens/eventos/palestrantes/',$n_nome.'-'.$id.'-'.$in.'.'.$extencao)){
                 $pal->save();
                Session::flash('success','Palestrante Registrado!');
                return redirect(route('evento.show',$id));
            }else{
                Session::flash('warning','Problema no Registro!');
                return back();
            }

        }else{
            Session::flash('info','Carregar uma imagem!');
            return back();
        }

    }

    public function palestranteUpdate(Request $request,$id, $id2){

        $pal = Evento_palestrante::find($id);
        $pal->nome = $request->nome;
        $pal->atividade = $request->atividade;
        $pal->formacao = $request->formacao;
        $pal->lattes = $request->lattes;

        $img = $request->img;

        if(isset($img)){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }

            $in = count(Evento_palestrante::all()) + 1;

            $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->nome)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));

            unlink(public_path().$pal->img);

            $pal->img  = '/imagens/eventos/palestrantes/'.$n_nome.'-'.$id.'-'.$in.'.'.$extencao;

            if( $img->move('./imagens/eventos/palestrantes/',$n_nome.'-'.$id.'-'.$in.'.'.$extencao)){
                 $pal->save();
                Session::flash('update','Palestrante Atualizado!');
                return redirect(route('evento.show',$id2));
            }else{
                Session::flash('warning','Problema no Registro!');
                return back();
            }

        }else{
            $pal->save();
            Session::flash('update','Palestrante Atualizado!');
            return redirect(route('evento.show',$id2));
        }

    }

    public function patrocinioDelete($id,$id2){

        unlink('.'.Evento_Patrocinios::find($id)->img);
        Evento_Patrocinios::destroy($id);
        Session::flash('warning','Patrocinio Removido!');
        return redirect()->route('evento.show',$id2);

    }

    public function palestranteDelete($id,$id2){

        unlink('.'.Evento_palestrante::find($id)->img);
        Evento_palestrante::destroy($id);
        Session::flash('warning','Palestrante Removido!');
        return redirect()->route('evento.show',$id2);

    }

    public function programacao(Request $request, $id){

        $evento = evento::find($id);
        $evento->programacao = $request->programacao;
        $evento->save();
        Session::flash('success','Sucesso!');
        return redirect()->route('evento.show',$id);
    }

    public function banner(Request $request, $id){

        $evento = evento::find($id);

        $img = $request->file('img');

        if(isset($img)){
            $extencao = $img->getClientOriginalExtension();
            $ideal_size = getimagesize($img);
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }

//            if($ideal_size[0] != 1360 && $ideal_size[1] != 400){
//                Session::flash('warning','Tamanho da imagem invalido!');
//                return back();
//            }

            if($evento->banner != ""){
                unlink(public_path().$evento->banner);
            }

            $evento->banner  = '/imagens/eventos/'.$evento->nome.'-'.$evento->id.'.'.$extencao;


            if( $img->move('./imagens/eventos/',$evento->nome.'-'.$evento->id.'.'.$extencao)){

                $evento->save();

                Session::flash('success','Novo evento registro!');
                return redirect(route('evento.show',$evento->id));
            }else{
                Session::flash('warning','Problema no cadastro!');
                return back();
            }

        }else{
            Session::flash('info','Carregar uma imagem!');
            return back();
        }

    }

    public function partAtividade($id,$id2){

        $admin = Admin::find( Auth::user()->id);

        $evento = evento::find($id2);

        $atvP = Participate_has_Atividade::where('participanteId','=',$id)->where('eventosId','=',$id2)->get();

        $title = 'Tecjr Eventos: ' . $evento->nome;
        return view('system/eventos/certificar-atividade', compact('evento','title','admin','atvP'));

    }

}
