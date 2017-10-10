
@php(set_include_path('http://127.0.0.1:8000'))
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$desc}}" >
    <meta name="keywords"  content="{{$key}}">

    <title>{{ $title or 'Tecjr' }}</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{asset(get_include_path().'/imagens/ico.png')}}" />

    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-touch-slider.css')}}">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap-3/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('OwlCarousel-master/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('OwlCarousel-master/owl-carousel/owl.theme.css')}}">

</head>
<body>

<header id="inicio">
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

                <img src="{{get_include_path().'/imagens/logo1.png'}}" width="150" height="79" alt="Logo da Empresa">

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav nav-custom navbar-nav navbar-nav-custom navbar-right">
                    <li class="hvr-underline-from-left"><a href="/">HOME</a></li>
                    <li class="hvr-underline-from-left"><a href="{{route('portifolio')}}">PORTFOLIO</a></li>
                    <li class="hvr-underline-from-left"><a href="/#equipe">EQUIPE</a></li>
                    <li class="hvr-underline-from-left"><a href="{{route('cursoEvento')}}">CURSOS/EVENTOS</a></li>
                    <li class="hvr-underline-from-left"><a href="{{route('contato')}}">CONTATOS</a></li>
                    {{--<li class="hvr-underline-from-left"><a href="/login">LOGIN</a></li>--}}
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<main>
@yield('content')
</main>

<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-8">
                    <img src="{{get_include_path().'/imagens/logo1.png'}}" class="img-responsive" width="400" alt="Logo">
                </div>
                <div class="col-lg-2  col-md-3 col-sm-3 col-xs-6">
                    <h3 class="text-center"> Tecjr </h3>
                    <ul style="margin-left: 30px">
                        <li class="text-left"> <a href="#"> Emprendedorismo </a> </li>
                        <li class="text-left"> <a href="#"> Tecnologia </a> </li>
                        <li class="text-left"> <a href="#"> Informação </a> </li>
                        <li class="text-left"> <a href="#"> Consutoria </a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-4 col-sm-6 col-xs-8">
                    <h3 class="text-center"> Trabalhamos com </h3>
                    <ul style="margin-left: 30px" >
                        <li> <a href="/portifolio"> Desenvolvimento de Sistemmas </a> </li>
                        <li> <a href="/portifolio"> Eventos Academicos </a> </li>
                        <li> <a href="/portifolio"> Cursos </a> </li>
                        <li> <a href="/contato"> Divugue em nosso site </a> </li>
                    </ul>
                </div>
                <div class="col-lg-4  col-md-4 col-sm-8 col-xs-12 ">
                    <h3 class="text-center"> Siga-nos  </h3>
                    <ul class="social" style="margin-left: 115px" >
                        <li> <a href="https://www.facebook.com/TecJrOficial"> <i class=" fa fa-facebook">   </i> </a> </li>
                        {{--<li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>--}}
                        <li> <a href="/contato"> <i class="fa fa-google-plus">   </i> </a> </li>
                        <li> <a href="https://www.instagram.com/tecjr/"> <i class="fa fa-instagram">   </i> </a> </li>
                    </ul>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> Copyright © Tecjr 2017. Todos os direitos resevardos. </p>
            <div class="pull-right">
                <ul class="nav nav-pills payments">
                    <li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="container">
    <a class=" pull-right subir " title="Subir" href="#inicio"> <i class="fa fa-angle-double-up" aria-hidden="true"></i> </a>
</div>

<!-- Scripts -->
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js"></script>
<script src="{{asset('bootstrap-3/js/bootstrap.min.js' )}}"></script>
<script src="{{asset('OwlCarousel-master/owl-carousel/owl.carousel.min.js' )}}"></script>
<script src="{{asset('js/toastr.min.js' )}}"></script>
<script src="{{asset('js/funcoes2.js' )}}"></script>
<script src="{{asset('js/myjs.js' )}}"></script>
<script src="{{asset('js/bootstrap-touch-slider.js' )}}"></script>


<script>
    $('#bootstrap-touch-slider').bsTouchSlider();
</script>

<script>
    $(document).ready(function () {

        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 5000
            };
            @if(Session::has('success')) //store
            toastr.success('{{ Session::get("success") }}');

            @elseif(Session::has('update')) //Edit
            toastr.warning('{{ Session::get("update") }}');

            @elseif(Session::has('info')) //Edit
            toastr.info('{{ Session::get("info") }}');

            @elseif(Session::has('warning'))// Delete
            toastr.error('{{ Session::get("warning") }}');
            @endif
        }, 1000);
    });
</script>

</body>
</html>