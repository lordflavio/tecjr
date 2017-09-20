<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title or 'Tecjr' }}</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{asset('/imagens/ico.png')}}" />

    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-touch-slider.css')}}">
    <link href="{{asset('bootstrap-3/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('OwlCarousel-master/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('OwlCarousel-master/owl-carousel/owl.theme.css')}}">

</head>
<body>

<header>
    <nav id="custom-bootstrap-menu" class="navbar navbar-default">
        <div class="container" id="topo_preto">
            <span class="pull-right" id="topoEm"><i class="fa fa-envelope-o" aria-hidden="true">&nbspempresa.tecjr@gmail.com</i></span>
            <span id="topoWa"><i class="fa fa-whatsapp" aria-hidden="true">&nbsp87 8122-7402</i></span>
        </div>
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <img src="imagens/logo1.png" width="150" height="79" alt="Logo da Empresa">

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav nav-custom navbar-nav navbar-nav-custom navbar-right">
                    <li class="hvr-underline-from-left"><a href="/">HOME</a></li>
                    <li class="hvr-underline-from-left"><a href="/portifolio">PORTFOLIO</a></li>
                    <li class="hvr-underline-from-left"><a href="#equipe">EQUIPE</a></li>
                    <li class="hvr-underline-from-left"><a href="#cursos">CURSOS/EVENTOS</a></li>
                    <li class="hvr-underline-from-left"><a href="/contato">CONTATOS</a></li>
                    <li class="dropdown">
                        <a id="user-profile" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="http://lorempixel.com/100/100/people/9/" class="img-responsive img-thumbnail img-circle"> <p> {{ Auth::user()->name }} </p></a><b class="caret pull-right"></b>
                        <ul class="dropdown-menu dropdown-menu-custom" role="menu">
                            <li><a href="{{'/perfil'}}">Perfil <span class="glyphicon glyphicon-user pull-right"></span></a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                    Logout <span class="glyphicon glyphicon-log-out pull-right"></span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form></li>
                        </ul>
                    </li>
                </ul>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <div class="rodape-claro">
        <div class="col-md-3">
            <img src="imagens/logo1.png" alt="Logotipo da empresa" class="logotipo">
        </div>
    </div>
    <div class="rodape-escuro">
        <span class="pull-right"><p>Created by Denis de Gois in TEC JR</p></span>
    </div>
</footer>

<!-- Scripts -->
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js"></script>
<script src="{{asset('bootstrap-3/js/bootstrap.min.js' )}}"></script>
<script src="{{asset('OwlCarousel-master/owl-carousel/owl.carousel.min.js' )}}"></script>
<script src="{{asset('js/myjs.js' )}}"></script>
<script src="{{asset('js/bootstrap-touch-slider.js' )}}"></script>
<script>
    $('#bootstrap-touch-slider').bsTouchSlider();
</script>


</body>
</html>