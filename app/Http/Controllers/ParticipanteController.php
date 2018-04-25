<?php

namespace App\Http\Controllers;

use App\Model\evento;
use App\Model\atividade;
use App\Model\Participate_has_Atividade;
use App\Model\Evento_inscritos;
use Illuminate\Http\Request;
use App\Model\participante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Model\Admin;
use App\Model\curso;
use App\Model\Transacoes;
use App\Model\Curso_inscritos;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Tecjr Perfil';
        $key = "";
        $desc = "Perfil Usuario";
        
        $participant = participante::find(Auth::user()->id);
//      $user =  Participant::all();
         
        $templete = 0;
        
         if(Auth::Guest()){
            $templete = 1;
        }
        
        if($participant){
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
            }else{
                $st = 0;
            }
            
            return view('user/perfil',compact('title','participant','desc','key','title','templete','st'));
        }else{
            participante::create(array(
                'nome' => "",
                'sexo'=> "",
                'pais'=> "",
                'cpf'=> "",
                'celular'=> "",
                'telefone'=> "",
                'area_cod'=> "",
                'cep'=> "",
                'endereco'=> "",
                'numero'=> 0,
                'cidade'=> "",
                'estado'=> "",
                'bairro'=> "",
                'formacao'=> "",
                'instituicao'=> "",
                'area_formacao'=> "",
                'subarea'=> "",
                'img'=> "/imagens/user.jpg",
                'id' => Auth::user()->id
            ));
             $st = 1;  
             $participant = participante::find(Auth::user()->id);
             return view('user/perfil',compact('title','participant','desc','key','title','templete','st'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function updates(Request $request, $id)
    {
        $user = participante::find($id);
        $user->nome = $request->nome;
        $user->pais = $request->pais;
        $user->cpf = $request->cpf;
        $user->sexo = $request->sexo;
        $user->telefone = $request->telefone;
        $user->area_cod = substr($request->telefone, 1,2);
        $user->celular = $request->celular;
        $user->cep = $request->cep;
        $user->endereco = $request->endereco;
        $user->numero = $request->numero;
        $user->cidade = $request->cidade;
        $user->estado = $request->estado;
        $user->bairro = $request->bairro;
        $user->formacao = $request->formacao;
        $user->instituicao = $request->instituicao;
        $user->area_formacao = $request->area_formacao;
        $user->subarea = $request->subarea;

        $user->save();
        Session::flash('success', 'Alterações realizada com sucesso');
        return redirect()->route('perfil-user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function curso()
    {
        $title = 'Tecjr Perfil - Meus Curso';
        $key = "";
        $desc = "Perfil Usuario";
        
        $participant = participante::find(Auth::user()->id);
//      $user =  Participant::all();
        $templete = 0;
        
        //$df = $tra->where('user_id', auth()->user()->id)->get();

        $df = Curso_inscritos::where('participanteId', auth()->user()->id)->get();



         $ins = array();
        //dd($df);

       for ($i = 0; $i < count($df); $i++){
            $ins['csf'][$i] = $df[$i];
            $ins['curso'][$i] = curso::where('id','=',$df[$i]->cursosId )->get()->first();
            $ins['transacao'][$i] = Transacoes::where('id','=',$df[$i]->transacaoId )->get()->first();
          // echo $i.'<br>';
       }

      // dd($ins);

       return view('user/perfil-cursos',compact('participant','key','title','desc','templete','ins'));
    }

    public function evento()
    {
        $title = 'Tecjr Perfil - Meus Eventos';
        $key = "";
        $desc = "Perfil Usuario";

        $participant = participante::find(Auth::user()->id);
//      $user =  Participant::all();
        $templete = 0;

        //$df = $tra->where('user_id', auth()->user()->id)->get();

        $df = Evento_inscritos::where('participanteId', auth()->user()->id)->get();

         $ins = array();
        // $insAtividade = array();
        //dd($df);

       for ($i = 0; $i < count($df); $i++){
           // $ins['csf'][$i] = $df[$i];
            $ins['evento'][$i] = evento::where('id','=',$df[$i]->eventosId )->get()->first();
            $ins['transacao'][$i] = Transacoes::where('id','=',$df[$i]->transacaoId )->get()->first();
//            $ins['ativ'][$i] = Atividades::where('eventoId','=',$df->eventosId[$i])->get();
//            $ativ = Participate_has_Atividade::where('participanteId','=',auth()->user()->id)->where('eventoId','=',$df->eventosId[$i])->get();
//            for ($j = 0; $j < count($ativ); $j++ ){
//                $ins['pAtiv'][$i] =  Atividades::where('id','=',$ativ[$j]->atividadeId)->get();
//            }
          // echo $i.'<br>';
       }

      // dd($ins);

       return view('user/perfil-eventos',compact('participant','key','title','desc','templete','ins'));
    }

    public function eventoAtividades($id)
    {
        $title = 'Tecjr Perfil - Meus Eventos - Atividades';
        $key = "";
        $desc = "Perfil Usuario - Meus Eventos - Atividades";

        $participant = participante::find(Auth::user()->id);
//      $user =  Participant::all();
        $templete = 0;

        $ativ =  atividade::where('eventoId','=',$id)->get();
        $p = new Participate_has_Atividade;

        return view('user/perfil-eventos-atividades',compact('participant','key','title','desc','templete','ativ','p'));
    }

    public function eventoParticipanteAtividades($id)
    {
        $title = 'Tecjr Perfil - Meus Eventos - Minhas Atividades';
        $key = "";
        $desc = "Perfil Usuario - Meus Eventos - Minhas Atividades";

        $participant = participante::find(Auth::user()->id);
//      $user =  Participant::all();
        $templete = 0;

        $ativ = Participate_has_Atividade::where('participanteId','=',auth()->user()->id)->where('eventosId','=',$id)->get();
        $ativIns = array();

        for ($j = 0; $j < count($ativ); $j++ ){
            $ativIns =  atividade::where('id','=',$ativ[$j]->atividadeId)->get();
        }


        return view('user/perfil-participates-has-atividades',compact('participant','key','title','desc','templete','ativIns'));
    }

    public function ativitadeIns($id, $id2)
    {
        $dataForm['participanteId'] = Auth::user()->id;
        $dataForm['eventosId'] = $id2;
        $dataForm['atividadeId'] = $id;
        $dataForm['certificado'] = 0;

        if( Participate_has_Atividade::create($dataForm)){

            Session::flash('success', 'Você foi Inscrito nessa Atividade!');
            return back();
        }else{
            Session::flash('info', 'Ops! um problema ocorreu tente novamente !');
            return back();
        }


    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, ['password' => 'required|string|min:6|confirmed']);
        
        $update = auth()->user()->updatePassword($request->password);
        
        if( $update ){
              Session::flash('success', 'Senha: atualizada Sucesso!');
            return redirect()->route('perfil-user');
        }else{
              Session::flash('warning', 'Falha ao atualizar!');
            return redirect()->route('perfil-user');
        }
    }
    
     public function tipoCurso($busca)
    {
        $title = 'Tecjr Perfil';
        $key = "";
        $desc = "Perfil Usuario";
        
        $curso = curso::where('nome','=',$busca)->first();
        
        $participant = participante::find(Auth::user()->id);
//      $user =  Participant::all();
        $templete = 0;
        
         if (!empty(Admin::find(Auth::user()->id))) {
                $templete = 1;
                return redirect()->route('home');
            } else {
                
                return view('user/pagamento/curso-pagamento',compact('participant','key','title','desc','templete','curso'));
  
        }
        
       
    }
    
     public function pagamentoCurso($tipo,$busca)
    {

        $key = "";
        $desc = "Perfil Usuario";
        
        $curso = curso::where('nome','=',$busca)->first();
        
        $participant = participante::find(Auth::user()->id);
//      $user =  Participant::all();
        $templete = 0;
        
        if (!empty(Admin::find(Auth::user()->id))) {
            $templete = 1;
            return redirect()->route('home');
        } else {

            if ($tipo == "boleto") {
                $title = 'Tecjr Pagamento Boleto';
                return view('user/pagamento/curso-pag-boleto', compact('participant', 'key', 'title', 'desc', 'templete', 'curso'));
            } else if ($tipo == "cartao") {
                $title = 'Tecjr Pagamento Cartão';
                return view('user/pagamento/curso-pag-cartao', compact('participant', 'key', 'title', 'desc', 'templete', 'curso'));
            }
        }
    }

    public function tipoEvento($busca)
    {
        $title = 'Tecjr Inscrição';
        $key = "";
        $desc = "Inscrição no Evento ";

        $evento = evento::where('nome','=',$busca)->first();

        $participant = participante::find(Auth::user()->id);
//      $user =  Participant::all();
        $templete = 0;

         if (!empty(Admin::find(Auth::user()->id))) {
                $templete = 1;
                return redirect()->route('home');
            } else {

                return view('user/pagamento/evento-pagamento',compact('participant','key','title','desc','templete','evento'));

        }


    }

     public function pagamentoEvento($tipo,$busca)
    {

        $key = "";
        $desc = "Pagamento da Inscrição";

        $evento = evento::where('nome','=',$busca)->first();

        $participant = participante::find(Auth::user()->id);
//      $user =  Participant::all();
        $templete = 0;

        if (!empty(Admin::find(Auth::user()->id))) {
            $templete = 1;
            return redirect()->route('home');
        } else {

            if ($tipo == "boleto") {
                $title = 'Tecjr Pagamento Boleto';
                return view('user/pagamento/evento-pag-boleto', compact('participant', 'key', 'title', 'desc', 'templete', 'evento'));
            } else if ($tipo == "cartao") {
                $title = 'Tecjr Pagamento Cartão';
                return view('user/pagamento/evento-pag-cartao', compact('participant', 'key', 'title', 'desc', 'templete', 'evento'));
            }
        }
    }

}
