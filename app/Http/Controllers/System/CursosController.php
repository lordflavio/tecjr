<?php

namespace App\Http\Controllers\System;

use App\Model\curso;
use App\Model\participante;
use App\Model\Curso_conteudo;
use App\Model\Curso_inscritos;
use App\Model\Transacoes;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Model\Admin;
use phpDocumentor\Reflection\Types\Array_;

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

        $admin = Admin::find( Auth::user()->id);
        $title = 'Tecjr novo Cursos';
        return view('system/cursos/novo-curso',compact('cursos','title','admin'));
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
                $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->titulo)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));
                $n_date =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->data)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));

                $curso = new curso();
                $curso->nome = $n_nome;
                $curso->data = $request->dat;
                $curso->inscricoes = false;
                $curso->valorInscricao = $request->valorInscricao;
                $curso->horario = $request->horario;
                $curso->titulo = $request->titulo;
                $curso->duracao = $request->duracao;
                $curso->descricao = $request->discricao;
                $curso->ministrante = $request->ministrante;
                $curso->publicoAlvo = $request->publicoAlvo;
                $curso->preRequisitos = $request->preRequisitos;
                $curso->objetivo = $request->objetivo;
                $curso->situacao = "Em programação";
                $curso->img  = '/imagens/cursos/'.$n_nome.'-'.$n_date.'.'.$extencao;

                $curso->save();

                if( $img->move('./imagens/cursos/',$n_nome.'-'.$n_date.'.'.$extencao)){
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
        $curso = curso::find($id);
        $conteudo = Curso_conteudo::where('cursosId','=',$id)->get();
        $admin = Admin::find( Auth::user()->id);
        $title = 'Tecjr '.$curso->nome;

        $part = Curso_inscritos::where('cursosId','=',$curso->id)->get();

        $participantes = array();
//        $participantes['part'];
//        $participantes['user'];

        for($i = 0; $i < count($part); $i++){
            $participantes['part'][$i] = Participante::where('id','=',$part[$i]->participanteId)->get()->first();
            $participantes['crf'][$i] = $part[$i];
            $participantes['user'][$i] = User::where('id','=',$part[$i]->participanteId)->get()->first();
        }

       // dd($participantes);


        return view('system/cursos/edite-curso',compact('title','curso','admin','conteudo','participantes'));
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

        $n_nome =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->titulo)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));
        $n_date =  strtolower( mb_ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($request->data)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")));

        $curso = curso::find($id);

        $curso->nome = $n_nome;
        $curso->valorInscricao = $request->valorInscricao;
        $curso->horario = $request->horario;
        $curso->titulo = $request->titulo;
        $curso->duracao = $request->duracao;
        $curso->descricao = $request->discricao;
        $curso->ministrante = $request->ministrante;
        $curso->publicoAlvo = $request->publicoAlvo;
        $curso->preRequisitos = $request->preRequisitos;
        $curso->objetivo = $request->objetivo;
        $curso->situacao = $request->situacao;

        if(isset($request->data)){
            $curso->data = $request->data;
        }

        if(isset($img)){
            $extencao = $img->getClientOriginalExtension();
            if($extencao != 'jpg' && $extencao != 'png'){
                Session::flash('warning','Tipo de imagem invalido!');
                return back();
            }

            unlink(public_path().$curso->img);

            if( $img->move('./imagens/cursos/',$n_nome.'-'.$n_date.'.'.$extencao)){
                $curso->img  = '/imagens/cursos/'.$n_nome.'-'.$n_date.'.'.$extencao;
                $curso->save();
                Session::flash('update','Atualiado!');
                return redirect(route('curso.show',$id));
            }else{
                Session::flash('warning','Problema no cadastro!');
                return back();
            }

        }else{
            $curso->save();
            Session::flash('update','Atualiado!');
            return redirect(route('curso.show',$id));
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

    /* Deletar Curso */

    public function delete($id){
        unlink(public_path().curso::find($id)->img);
        curso::destroy($id);

        Session::flash('warning','Curso Removido!');
        return redirect()->route('curso.index');
    }
    /* Add Conteudo ao Curso */
    public function addConteudo(Request $request, $id){

        $c = new Curso_conteudo();
        $c->cursosId = $id;
        $c->conteudo = $request->conteudo;
        $c->save();
        Session::flash('success','Conteudo registrado!');
        return redirect(route('curso.show',$id));
    }
    /* Deletar Conteudo */
    public function deleteConteudo($id, $id2){

        Curso_conteudo::destroy($id);
        Session::flash('warning','Conteudo Removido!');
        return redirect()->route('curso.show',$id2);
    }

    /* Ativar Curso */
    public function ative($id){

        $curso = curso::find($id);
        $curso->inscricoes = true;
        $curso->save();
        Session::flash('success','Ativado!');
        return redirect()->route('curso.show',$id);
    }
    /* Ativar Curso */
    public function desative($id){

        $curso = curso::find($id);
        $curso->inscricoes = false;
        $curso->save();
        Session::flash('warning','Desativado!');
        return redirect()->route('curso.show',$id);
    }

//    public function addView($id){
//        $curso = curso::find($id);
//        $admin = Admin::find( Auth::user()->id);
//        $title = 'Tecjr Curso Add Participante  '.$curso->nome;
//
//        return view('system/cursos/add-participante', compact('$admin', 'title','curso'));
//
//    }

    public function addParticipante ($id, Request $request){

        $curso = curso::find($id);
        $admin = Admin::find( Auth::user()->id);
        $title = 'Tecjr Curso Add Participante  '.$curso->nome;

        $participante =  participante::where('cpf','=',$request->cpf)->first();

        if(isset($participante->id)){
            return view('system/cursos/add-participante', compact('admin', 'title', 'curso','participante'));
        }else{
            Session::flash('warning','Participante Não Encontrado!');
            return redirect()->route('curso.show',$id);
        }


    }

    public function adicionar ($id, $idP){

        $cursIs = Curso_inscritos::where('participanteId','=',$idP)->first();

        if(isset($cursIs)){
            Session::flash('info','Úsuario já inscrito');
            return redirect()->route('curso.show',$id);
        }else{
            $tr = new Transacoes();

            $object = curso::find($id);

            $tr->newTransacaoFree($object, uniqid(date('YmdHis')), uniqid(date('YmdHis')), 1, 7, 1,$idP);
                Session::flash('success','Participante Adicionado');
                return redirect()->route('curso.show',$id);

                Session::flash('warning','Problema ao adcionar, Tente novamente');
                return redirect()->route('curso.show',$id);

        }



    }

    public function certificar($id, $id2, Request $resquest){
        $crf = Curso_inscritos::where('cursosId','=',$id)->where('participanteId','=',$id2)->first();
        $crf->certificado = intval($resquest->crf);
        if($crf->save()){
            Session::flash('success','Participante Certificado!');
            return redirect()->route('curso.show',$id);
        }else{
            Session::flash('warning','Problema, Tente novamente');
            return redirect()->route('curso.show',$id);
        }

    }

    public function remove ($id, $id2){
        Curso_inscritos::destroy(Curso_inscritos::where('participanteId','=',$id)->first()->id);

        Session::flash('success','Participante Removido!');
        return redirect()->route('curso.show',$id2);
    }
}
