<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use App\Model\curso;
use App\Model\Curso_conteudo;
use App\Model\evento;
use App\Model\Evento_palestrante;
use App\Model\Evento_Patrocinios;
use App\Model\Evento_submissao;
use App\Model\Noticias;
use App\Model\atividade;
use App\Model\Patrocinio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ControllerOut extends Controller
{
    public function welcome()
    {
        $patrocinio = Patrocinio::all();
        $noticias = Noticias::all();
        $gestao = Admin::all();

        $cursos = curso::orderBy('id', 'desc')->get();
        $evento = evento::orderBy('id', 'desc')->get();

        $title = 'Tecjr';
        $key = " Evento, Tecjr, UPE, Universidade de Pernabuco, Eventos Gratuido, Palestras, Mesas Redondas, Minicursos, Inscrição, Empresa Jr, Consutoria, Noticias UPE, Tecjr";
        $desc ="A Tecnologia, Educação e Consultoria Júnior da Universidade de Pernambuco (UPE), é uma associação civil sem fins lucrativos e com prazo de duração indeterminado, formada pelos alunos de graduação do Curso de Licenciatura em Computação da Universidade de Pernambuco (UPE).";

        return view('/welcome',compact('patrocinio','noticias','gestao','cursos','evento','title','key','desc'));
    }
    public function portifolio()
    {
        $title = 'Tecjr Portifolio';
        $key = "Deselvolvimento web, Software, Eventos Acadêmicos, Curso, Java, Python, Consutoria, Recrutamento, Desenvolvimento de Software, Sites, Apps Android, Seleção ";
        $desc ="";

        return view('/portifolio',compact('title','key','desc'));
    }

//    public function noticias()
//    {
//        $title = 'Tecjr Noticias';
//        $key = "Universidade de Pernambuco, UPE, Pleno, Noticias, Novidades, Hoje na UPE";
//        $desc ="";
//        return view('/noticias',compact('title','key','desc'));
//    }

    public function contato()
    {
        $title = 'Tecjr Contato';
        $key = " Evento, Tecjr, UPE, Universidade de Pernabuco, Eventos Gratuido, Palestras, Mesas Redondas, Minicursos, Inscrição, Empresa Jr, Consutoria, Noticias UPE, Tecjr";
        $desc ="A empresa Tecnologia, Educação e Consultoria Júnior da Universidade de Pernambuco (UPE) atende pelos seguintes meios, telefone, e-mail, Fecebook e Instagram.";

        return view('/contato',compact('title','key','desc'));

    }

    public function cursosEventos()
    {
        $cursos = curso::orderBy('id', 'desc')->get();
        $eventos = evento::orderBy('id', 'desc')->get();
        $title = 'Tecjr Cursos/Eventos';
        $key = "Deselvolvimento web, Software, Eventos Acadêmicos, Curso, Java, Python, Consutoria, Recrutamento, Desenvolvimento de Software ";
        $desc ="";

        return view('/curso-evento',compact('cursos','eventos', 'title','key',"desc"));
    }

    public function curso($curso)
    {
        $curso = curso::all()->where('nome','=',$curso);
        $conteudo = Curso_conteudo::all()->where('cursosId','=',$curso[0]->id);
        $title = $title = 'Tecjr '.$curso[0]->titulo;
        $title = 'Tecjr Cursos/Eventos';
        $key = "Tecjr Cursos, Cursos UPE, Java, HTML5, Python, Banco de Dados";
        $desc = $curso[0]->discricao;
        return view('/curso',compact('curso','title','conteudo','key','desc','title'));


    }

    public function evento ($evento){

       $even = evento::all()->where('nome','=',$evento);

        if(count($even) <= 0){
             return redirect(route('welcome'));
        }

        $palestrante = Evento_palestrante::all()->where('eventoid','=',$even[0]->id);
        $patrocinios = Evento_Patrocinios::all()->where('eventoid','=',$even[0]->id);
        $submissao = Evento_submissao::all()->where('eventoid','=',$even[0]->id);
        $ativ = atividade::all()->where('eventoId','=',$even[0]->id);

        /*-----------------Calculando dias do para execução do evento------------*/

        $diferenca =  strtotime($even[0]->dateInicioEx) - strtotime($even[0]->dateFimEx);
        $dia = floor($diferenca / (60 * 60 * 24));

        $dia = ($dia * (-1));

        $mes_extenso = array(
            'Jan' => 'Janeiro',
            'Feb' => 'Fevereiro',
            'Mar' => 'Marco',
            'Apr' => 'Abril',
            'May' => 'Maio',
            'Jun' => 'Junho',
            'Jul' => 'Julho',
            'Aug' => 'Agosto',
            'Nov' => 'Novembro',
            'Sep' => 'Setembro',
            'Oct' => 'Outubro',
            'Dec' => 'Dezembro'
        );
        $m = date("M", strtotime($even[0]->dateInicioEx));
        $mes = $mes_extenso[$m];
        $ano = date("Y", strtotime($even[0]->dateInicioEx));

        $dias[0] = date("d", strtotime($even[0]->dateInicioEx));

        $in = $even[0]->dateInicioEx;

        for ($i = 1; $i <= $dia; $i++){
           $in = date('y-m-d', strtotime('+1 days', strtotime($in)));
            $dias[$i] = date("d", strtotime($in));
//           echo $dias[$i].'<br>';
        }

        /*-----------------Fim de Calculo---------------------------------*/

        $atividades = null;
        $novo = null;
        $cont = 0;

        for ($j = 0; $j < count($dias); $j++){
            for ($k = 0; $k < count($ativ); $k++){
                if(date("d", strtotime($ativ[$k]->data)) == $dias[$j]){
                    $novo[$cont] = $ativ[$k];
                    $cont++;
                }
            }
            $atividades[$dias[$j]] = $novo;
            $novo = null;
            $cont = 0;
        }

      // echo count($atividades['16']) ;

       $contagem = json_encode($even[0]->dateInicioEx, JSON_PRETTY_PRINT);

        $title = 'Tecjr '.$even[0]->titulo;
        $key = $even[0]->titulo.", Evento, Tecjr, UPE, Universidade de Pernabuco, Eventos, Gratuido, Palestras, Mesas Redondas, Minicursos, Inscrição ";
        $desc = $even[0]->sobre;

       return view('/eventos',compact( 'even',
                                       'contagem',
                                       'patrocinios',
                                       'submissao',
                                       'atividades',
                                       'ativ',
                                       'mes',
                                       'ano',
                                       'dias',
                                       'palestrante',
                                       'title',
                                       'key',
                                       'desc'));

    }


    public function envio (Request $request){
        $nome= $request->nome;
        $email= $request->email;
        $assunto = $request->assunto;
        $mensagem= $request->mensagem;

        $destino = "empresa.tecjr@gmail.com";

        $titulo= "Mensagem do Site";

        $data = date ("d-m-Y", time());
        $hora = date ("H:i", time());

        $mensagem1 = "<html>
            <head>
                <title>Tecjr - UPE 2017 - Duvidas</title>
                <style>
                    @import url('https://fonts.googleapis.com/css?family=Anton');
                </style>
            </head>
            <body>
                <strong style='font-size: 16px; font-family: 'Anton'>Enviado por:</strong><b style='font-size: 16px; font-family: 'Anton'> $email</b><br>
                <strong style='font-size: 16px; font-family: 'Anton'>Nome:</strong><b style='font-size: 16px; font-family: Arial;'> $nome</b><br>
                <strong style='font-size: 16px; font-family: 'Anton'>Assunto:</strong><b style='font-size: 16px; font-family: 'Anton'> $assunto</b><br>
                <strong style='font-size: 16px; font-family: 'Anton'>Menssagem:</strong><br>
                <p style='font-size: 16px; font-family: 'Anton'>$mensagem</p>
                <p style='font-size: 14px; font-family: 'Anton'>Enviado no dia: $data <br>Atravez do Site: <a href='http://www.tecjr.com.br/'>http://www.tecjr.com.br/</a></p>
            
            </body>
            </html>";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $headers .= "To: TECJR-UPE 2017 <$destino>" . "\r\n";
        $headers .= "From: $nome <$email>" . "\r\n";
        $headers .= "Cc: $email" . "\r\n";
        $headers .= "Bcc: $email" . "\r\n";

        mail($destino,$titulo,$mensagem1,$headers);

        Session::flash('success','Enviado!');
        return redirect(route('contato'));
    }


}
