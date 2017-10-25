<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="{{$desc}}" >
    <meta name="keywords"  content="{{$key}}">

    <title style="text-transform: uppercase"> {{ $title }}</title>

    <link rel="shortcut icon" href="{{asset('/imagens/ico.png')}}" />
    <link rel="stylesheet" href="{{asset('css/estilo.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">



</head>
<body>
<header style="background-image: url('{{($even[0]->banner != "" ? $even[0]->banner : '/imagens/eventos/a.png')}}');">
    <div class="col-md-12 text-center">
        <img src="{{$even[0]->img}}" alt="Logos" class="img-responsive" style="max-width: 500px; max-height: 190px;">
    </div>
    <nav>
        <div class="container">
            <div class="row" style="padding-top:50px">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">

                    <div class="list-group-custom list-group-horizontal">
                        <a href="#sobre-evento" class="list-group-item">Sobre</a>
                        <a href="#incricoes" class="list-group-item">Inscrição</a>
                        <a href="#palestrantes" class="list-group-item">Cronograma</a>
                        {{--<a href="#" class="list-group-item">Galeria</a>--}}
                        <a href="#submissao" class="list-group-item">Submissão</a>
                        <a href="/contato" class="list-group-item">Contato</a>
                    </div>

                </div>
            </div>
        </div>
    </nav>

</header>

@if(strtotime($even[0]->dateInicioEx) > strtotime(date('y-m-d')))
<section id="cr">
    <div id="inicio" style="display:none"><?php echo $contagem; ?></div>

    <div class="container">
        <div class="espacamento">
            <h1>Venha participar! </h1>
            <h2>Estamos em contagem regressiva, faltam apenas:</h2>
        </div>
    </div>
    <section id="relogio">
        <div class="container">
            <div class="row">
                <div id="timer">
                    <div id="days"></div>
                    <div id="hours"></div>
                    <div id="minutes"></div>
                    <div id="seconds"></div>
                </div>
            </div>
        </div>
    </section>
</section>
@endif

<section id="sobre-evento">
    <div class="container">

        <div>
            <h1>Sobre o evento</h1>
        </div>

        <div class="sobre">
            <div class="col-md-12 col-sm-12">
                <p>{{$even[0]->sobre}}</p>
            </div>
        </div>
    </div>


</section>

<section id="incricoes">
    <div class="container espacamento">
        <div>
            <h1>Inscrições</h1>
        </div>

        <div class="descricao-inscricao">
            <div class="col-md-12">
                <p>{{$even[0]->descIns}}</p>
            </div>
            <div class="col-md-12">
                <a style="text-decoration: none" href="https://docs.google.com/forms/d/e/1FAIpQLSdf8v6RKPhxLoCUCXt1a5v5nOlhIQL7T-UO3RyiHJEHQldC5A/viewform"><button id="js-trigger-overlay" type="button">Fazer Inscrição</button></a>
            </div>
        </div>
    </div>
    <?php echo $even[0]->map ?>
</section>

<section id="palestrantes">
    <div class="container">
        <div class="espacamento">
            <h1>Alguns Palestrantes</h1>
        </div>

        <!--- https://bootsnipp.com/snippets/featured/fancy-tabs-responsive#comments -->
        <div class="container text-center">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-sm-offset-2 col-md-12 col-md-offset-3" role="tabpanel">
                    <div class="col-xs-4 col-sm-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-justified" id="nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#{{'p'.$palestrante[0]->id}}" aria-controls="#{{'p'.$palestrante[0]->id}}" role="tab" data-toggle="tab">
                                    <img class="img-circle" src="{{$palestrante[0]->img}}" width="120" height="120" />
                                </a>
                            </li>
                            @for($i = 1; $i < count($palestrante); $i++)
                                <li role="presentation" class="">
                                    <a href="#{{'p'.$palestrante[$i]->id}}" aria-controls="#{{'p'.$palestrante[$i]->id}}" role="tab" data-toggle="tab">
                                        <img class="img-circle" src="{{$palestrante[$i]->img}}" width="120" height="120" />
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="col-xs-8 col-sm-12">
                        <!-- Tab panes -->
                        <div class="tab-content" id="tabs-collapse">
                            <div role="tabpanel" class="tab-pane active" id="{{'p'.$palestrante[0]->id}}">
                                <div class="tab-inner">
                                    <p class="lead">{{$palestrante[0]->atividade}}</p>
                                    <hr>
                                    <p><strong class="text-uppercase">{{$palestrante[0]->nome}}</strong></p>
                                    <p><em class="text-capitalize"> {{$palestrante[0]->formacao}} </em> - <a href="{{$palestrante[0]->lattes}}">Lattes</a></p>
                                </div>
                            </div>
                            @for($i = 1; $i < count($palestrante); $i++)
                                <div role="tabpanel" class="tab-pane" id="{{'p'.$palestrante[$i]->id}}">
                                    <div class="tab-inner">
                                        <p class="lead">{{$palestrante[$i]->atividade}}</p>
                                        <hr>
                                        <p><strong class="text-uppercase">{{$palestrante[$i]->nome}}</strong></p>
                                        <p><em class="text-capitalize"> {{$palestrante[$i]->formacao}} -  </em>  <a href="{{$palestrante[$i]->lattes}}">Lattes</a></p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="programacao">

            <div class="col-md-12 espacamento-programacao">
                <h1>Programação Completa</h1>
            </div>

            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'Menu')" id="defaultOpen">Evento</button>
                @foreach($dias as $dia)
                <button class="tablinks" onclick="openTab(event, '{{$dia}}')">Dia {{$dia}}</button>
                @endforeach
            </div>

            <div id="Menu" class="tabcontent">
                <div class="descricao">
                    <h2 style="text-transform: uppercase">{{$even[0]->titulo}}</h2>
                    <?php $data = "";
                       for ($i = 0; $i < count($dias); $i++){
                          if($i == (count($dias) - 2)){
                              $data .= $dias[$i].' e ';
                          }else if($i == (count($dias) - 1)){
                              $data .= $dias[$i];
                          }else{
                              $data .= $dias[$i].', ';
                          }
                       }
                    ?>
                    <h3>{{$data}} de {{$mes}} de {{$ano}}</h3>
                </div>
                <div class="infos">
                    <p class="text-center">DOWNLOAD <a href="{{$even[0]->programacao}}">PROGRAMAÇÃO COMPLETA</a></p>
                </div>
            </div>

            @foreach($dias as $dia)
            <div id="{{$dia}}" class="tabcontent">
                <div class="descricao">
                    <h1>Dia {{$dia}} de {{$mes}}</h1>
                    {{--<h2>Segunda-Feira</h2>--}}
                </div>

                <?php $size = round((count($atividades[$dia]) / 2));
                      $cont = 0;
                ?>


                <div class="row">

                    <div class="col-md-6 linha">

                        @for( $i = 0; $i < count($atividades[$dia]); $i++ )
                            @if($cont < $size)
                                <div class="programacao-completa">
                                    <b>{{$atividades[$dia][$i]->horario}}</b><br>
                                    <b>Tema: </b> {{($atividades[$dia][$i]->titulo. ' - '. $atividades[$dia][$i]->modalidade)}}  <br>

                                    @if($atividades[$dia][$i]->area != "")
                                    <b>Area: </b> {{$atividades[$dia][$i]->area}} <br>
                                    @endif

                                    @if($atividades[$dia][$i]->palestrante != "")
                                    <b>Palestrante: </b> {{$atividades[$dia][$i]->palestrante}} <br>
                                    @endif

                                    @if($atividades[$dia][$i]->cordenacao != "")
                                    <b>Coordenação: </b> {{$atividades[$dia][$i]->cordenacao}}  <br>
                                    @endif

                                    @if($atividades[$dia][$i]->convidados != "")
                                    <b>Convidados: </b> {{$atividades[$dia][$i]->convidados}}  <br>
                                    @endif

                                    <b>Local: </b>{{$atividades[$dia][$i]->local}}<br>
                                    <hr>
                                </div>
                                <?php $cont++ ?>
                            @endif
                        @endfor

                    </div>

                    <div class="col-md-6">
                        @for( $i = $cont; $i < count($atividades[$dia]); $i++ )
                            @if($cont >= $size)
                                <div class="programacao-completa">
                                    <b>{{$atividades[$dia][$i]->horario}}</b><br>
                                    <b>Tema :</b> {{($atividades[$dia][$i]->titulo. '-' . $atividades[$dia][$i]->modalidade)}} <br>
                                    <b>Area :</b> {{($atividades[$dia][$i]->area)}} <br>
                                    <b>Palestrante :</b> {{($atividades[$dia][$i]->palestrante)}} <br>
                                    <b>Coordenação :</b> {{($atividades[$dia][$i]->cordenacao)}}  <br>
                                    <b>Local:</b>{{$atividades[$dia][$i]->local}}<br>
                                    <hr>
                                </div>
                            @endif
                        @endfor
                    </div>
                <?php   $cont = 0 ?>
                </div>
            </div>
            @endforeach
        </div>
    </div> <!--- CONTAINER -->

</section>

@if(count($submissao) > 0)
<section id="submissao">
    <div class="container">
        <div class="col-md-12 col-xs-12">
            <div class="espacamento">
                <h1>Submissão</h1>
            </div>
            <div class="col-md-12">
                <p class="texto-sub">{{$submissao[0]->descricao}}</p>
                <div class="col-md-12" style="padding-bottom: 30px;">
                    <a style="text-decoration: none"  target="_blank"  href="{{$submissao[0]->link}}"> <button type="button">Submeter Trabalho</button></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section id="patrocinio">
    <div class="container">
        <div class="espacamento">
            <h2>Organização e Patrocinio</h2>
        </div>

        <div class="col-md-12">
            <div class="row">
                @if(count($patrocinios) > 0)
                    @foreach($patrocinios as $p)
                        <div class=" col-md-3 " style="padding-bottom: 15px">
                            <img src="{{$p->img}}" width="180" height="120" alt="APOIO">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

            <!---
            Carousel
               http://flexslider.woothemes.com/thumbnail-slider.html
            -->

        </div>


    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 footer-col">
                <p><img src="{{$even[0]->img}}" alt="Logos" class="logo-footer"></p>
                <p><i class="fa fa-map-pin"></i> {{$even[0]->endereco.', '.$even[0]->numero.', - '.$even[0]->bairro.', '.$even[0]->cidade.' - '.$even[0]->estado.', '.$even[0]->cep}}</p>
                <p><i class="fa fa-phone"></i> Fone (Brasil): +55 {{$even[0]->fone}}</p>
                <p><i class="fa fa-envelope"></i> E-mail: {{$even[0]->email}}</p>

            </div>
            <div class="col-md-3 col-sm-6 footer-col">
                <h6 class="heading7">LINKS GERAIS</h6>
                <ul class="footer-ul">
                    <li><a href="#sobre-evento"> Sobre</a></li>
                    <li><a href="#incricoes"> Inscrições</a></li>
                    <li><a href="#palestrantes"> Programação</a></li>
                    <li><a href="#submissao"> Submissao</a></li>
                    <li><a href="#patrocinio"> Organização e Patrocínio</a></li>
                    <li><a href="/contato"> Contato</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 footer-col">
                <h6 class="heading7">REDES SOCIAIS</h6>
                <ul class="footer-social">
                    <li><a href="https://www.facebook.com/TecJrOficial"><i class="fa fa-facebook social-icon facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/tecjr/"><i class="fa fa-instagram social-icon instagram" aria-hidden="true"></i></a></li>
                    <li><a href="/contato"><i class="fa fa-google-plus social-icon google" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>

    <ul style="margin-bottom: 0;">
        <li><a id="back-to-top" href="#" class="btn-alt btn-custom back-to-top" role="button" title="Volte ao topo da pagina" data-toggle="tooltip" data-placement="top"><span class="fa fa-angle-double-up fa-2x"></span></a></li>
        <li><a href="http://www.tecjr.com.br" class="btn-alt btn-custom back-to-home" role="button" title="Voltar ao Site TecJr." data-toggle="tooltip" data-placement="left"><span class="fa fa-home fa-2x"></span></a></li>
    </ul>

</footer>
<div class="copyright">
    <div class="container">
        <div class="col-md-12">
            <p class="pull-right">© 2017 - Developed by <a href="https://www.tecjr.com.br" target="_blank">Tec Jr.</a></p>
        </div>

    </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="{{asset('js/funcoes.js' )}}"></script>
</body>
</html>