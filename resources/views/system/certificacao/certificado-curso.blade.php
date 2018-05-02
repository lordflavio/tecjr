

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Certificado Digital</title>

    <!--Custon CSS-->
    <link rel="stylesheet" href="css/certificate.css">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset('imagens/ico.png')}}" />

</head>
<body>

<div class="certificado" style="margin-left: 75px">
    <img src="imagens/Model-Certification.png" class="img-back-cert" alt="Certificado Digital Tecjr">

    <div class="conteudo-certificado text-center">
        <h1 class="titulo-certificado">CERTIFICADO</h1>

        <p class="detalhes-certificado text-justify" style="width: 700px">
            Certificamos que <span class="nome-aluno">{{$part->nome}}</span> Portador do CPF nº <span class="curso">{{$part->cpf}}</span> concluiu com
          êxito Curso de <span class="curso"> {{$curso->titulo}} </span> oferecido plea  Tecnologia, Educação e Consultoria Jr.(Tecjr) com carga horária de {{$curso->duracao}} horas,
            comcluída em {{$curso->getData($curso->data)}}
        </p>

        {{--<h3 class="mais-detalhes-certificado">--}}
            {{--Certificado nº <b>XrOIJ76O</b> para verificar se é um certificado válido: academy.especializati.com.br/verificar-certificado--}}
        {{--</h3>--}}

        <h4 class="data-certificado">
           Garanhums, {{$curso->getData(date('y-m-d'))}}
        </h4>
    </div>

</div><!--Certificado-->

</body>
</html>
