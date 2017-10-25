@extends('layouts.tamplate-principal')

@section('content')
    <section id="inicial">
        <div id="bootstrap-touch-slider" class="carousel bs-slider control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">

                <!-- Third Slide -->
                <div class="item active">

                    <!-- Slide Background -->
                    <img src="/imagens/baner/01.jpg" alt="BANNER 01"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>

                    <div class="container">
                        <div class="row">
                            <!-- Slide Text Layer -->
                            <div class="slide-text slide_style_left">
                                <h1 data-animation="animated zoomInRight">Bem Vindo a Tecjr</h1>
                                <p data-animation="animated fadeInLeft">Tecnologia, Educação e Consultoria Júnior da Universidade de Pernambuco (UPE)</p>
                                {{--<a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-default" data-animation="animated fadeInLeft">select one</a>--}}
                                {{--<a href="http://bootstrapthemes.co/" target="_blank"  class="btn btn-primary" data-animation="animated fadeInRight">select two</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Second Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="/imagens/baner/02.jpg" alt="BANNER 02"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_center">
                        <h1 data-animation="animated flipInX">A primeira empresa júnior de um curso de licenciatura. </h1>
                        {{--<p data-animation="animated lightSpeedIn">Make Bootstrap Better together.</p>--}}
                        {{--<a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-default" data-animation="animated fadeInUp">select one</a>--}}
                        {{--<a href="http://bootstrapthemes.co/" target="_blank"  class="btn btn-primary" data-animation="animated fadeInDown">select two</a>--}}
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Third Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="/imagens/baner/03.jpg" alt="BANNER 03"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_right">
                        <h1 data-animation="animated zoomInLeft">Consultoria, desenvolvimento e educação júnior</h1>
                        {{--<p data-animation="animated fadeInRight">Consultoria, desenvolvimento e educação júnior</p>--}}
                        {{--<a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-default" data-animation="animated fadeInLeft">select one</a>--}}
                        {{--<a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-primary" data-animation="animated fadeInRight">select two</a>--}}
                    </div>
                </div>
                <!-- End of Slide -->


            </div><!-- End of Wrapper For Slides -->

            <!-- Left Control -->
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div> <!-- End  bootstrap-touch-slider Slider -->
    </section>

    @if(isset($noticias[0]))
    <section id="noticias">
        <div class="container">

            <div class="row topo_noticias">
                <h1>Noticias sobre a UPE</h1>
                {{--<p id="subtitulo">If you are going to use a passage of Lorem Ipsum, you need to be </p>--}}
            </div>

            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active">
                        <img src="{{$noticias[0]->img}}" width="760" height="400">
                        <div class="carousel-caption">
                            <h4>{{$noticias[0]->titulo}}</h4>
                            <p> {{$noticias[0]->descricao}}
                                {{--<a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Saiba mais</a>--}}
                            </p>
                        </div>
                    </div><!-- End Item -->

                    @if(count($noticias) < 5)
                        @for($i = 1; $i < count($noticias); $i++)
                        <div class="item">
                            <img src="{{$noticias[$i]->img}}" width="760" height="400">
                            <div class="carousel-caption">
                                <h4>{{$noticias[$i]->titulo}}</h4>
                                <p> {{$noticias[$i]->descricao}}
                                    {{--<a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Saiba mais</a>--}}
                                </p>
                            </div>
                        </div><!-- End Item -->
                        @endfor
                    @elseif(count($noticias) > 5)
                        @for($j = 1; $j < 5; $j++)
                        <div class="item">
                            <img src="{{$noticias[$j]->img}}" width="760" height="400">
                            <div class="carousel-caption">
                                <h4>{{$noticias[$j]->titulo}}</h4>
                                <p> {{$noticias[$j]->descricao}}
                                    {{--<a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Saiba mais</a>--}}
                                </p>
                            </div>
                        </div><!-- End Item -->
                        @endfor
                    @endif

                </div><!-- End Carousel Inner -->


                <ul class="list-group col-sm-4">
                    <li data-target="#myCarousel" data-slide-to="0" class="list-group-item active"><h4>{{$noticias[0]->subtitulo}}</h4></li>
                    @if(count($noticias) < 5)
                        @for($i = 1; $i < count($noticias); $i++)
                            <li data-target="#myCarousel" data-slide-to="{{$i}}" class="list-group-item"><h4>{{$noticias[$i]->subtitulo}}</h4></li>
                        @endfor
                    @elseif(count($noticias) > 5)
                        @for($j = 1; $j < 5; $j++)
                            <li data-target="#myCarousel" data-slide-to="{{$j}}" class="list-group-item"><h4>{{$noticias[$j]->subtitulo}}</h4></li>
                        @endfor
                </ul>


            @endif

                <!-- Controls -->
                <div class="carousel-controls">
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div><!-- End Carousel -->
        </div>
    </section><!-- OK -->
    @endif



    <section id="equipe">
        <div class="container">
            <div class="row espacamento-equipe">
                <h1>Nossa Equipe</h1>
            </div>
        </div>
        <div class="container">
            @if(count($gestao) > 0)

            @endif

        </div>
    </section>



    <section id="cursos">
        <div class="container">
            <div class="espacamento">
                <h1 class="titulo-secao">Cursos e Eventos</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if(isset($evento[0]))
                    <div class="col-md-4">
                        <a href="/eventos/{{$evento[0]->nome}}">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{$evento[0]->img}}" class="img-responsive" alt="Berry Lace Dress">
                                </div>
                                <h3 class="titulo-cursos">{{$evento[0]->titulo}} </h3>

                                <div class="sticker sticker-new"></div>
                            </div>
                        </a>
                    </div>
                    @endif

                    @if(isset($cursos[0]))
                    <div class="col-md-4">
                        <a href="/curso/{{$cursos[0]->nome}}">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{$cursos[0]->img}}" class="img-responsive"  alt="NOVO EVENTO">
                                </div>
                                <h3 class="titulo-cursos sticker-new">{{$cursos[0]->titulo}}</h3>
                            </div>
                        </a>
                    </div>
                    @endif

                    <div class="col-md-4">
                        <a href="/cursos-e-eventos">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="/imagens/CURSOS.png" class="img-responsive" alt="Berry Lace Dress">
                                </div>
                                <h3 class="titulo-cursos">OUTROS CURSOS E EVENTOS </h3>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{--<section id="cursos">--}}
        {{--<div class="container">--}}

            {{--<div class="row cabecalho_secao">--}}
                {{--<h1>Cursos e Eventos</h1>--}}
                {{--<p>Entre em contato conosco para saber mais.</p>--}}
            {{--</div>--}}

            {{--<button  type="button" id="b-cursos-left"><i class="fa fa-chevron-left"></i></button>--}}
            {{--<button  type="button" id="b-cursos-right"><i class="fa fa-chevron-right"></i></button>--}}

            {{--<div id="owl-demo-3" class="espacamento">--}}

                {{--@if(isset($evento[0]))--}}

                {{--<div class="item  center-block">--}}
                    {{--<div class="contorno">--}}
                        {{--<img src="{{$evento[0]->img}}" alt="pessoa1" class="img-responsive center-block">--}}
                        {{--<h4 class="text-center" style="text-transform: uppercase"> {{$evento[0]->titulo}} </h4>--}}
                        {{--<span class="descricao">{{$evento[0]->sobre}}</span>--}}
                        {{--</br><div class="center-block buttom-custom-1 "><a style="text-decoration: none;" href="/eventos/{{$evento[0]->nome}}"><p class="texto-button"> - SAIBA MAIS - </p></a></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--@endif--}}

                {{--@if(isset($evento[1]))--}}
                {{--<div class="item center-block">--}}
                    {{--<div class="contorno">--}}
                        {{--<img src="{{$evento[1]->img}}" alt="pessoa1" class="img-responsive center-block">--}}
                        {{--<h4 class="text-center" style="text-transform: uppercase"> {{$evento[1]->titulo}} </h4>--}}
                        {{--<span class="descricao">{{$evento[1]->sobre}}</span>--}}
                        {{--</br><div class="center-block buttom-custom-1 "><a style="text-decoration: none;" href="/eventos/{{$evento[1]->nome}}"><p class="texto-button"> - SAIBA MAIS - </p></a></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--@endif--}}

                @if(isset($cursos[0]))
                <div class="item center-block">
                    <div class="contorno">
                        <img src="{{$cursos[0]->img}}" alt="CURSO" class="img-responsive center-block">
                        <h4 class="text-center" style="text-transform: uppercase"> {{$cursos[0]->titulo}} </h4>
                        <span class="descricao">{{$cursos[0]->discricao}}</span>
                        </br> <div class="buttom-custom-1"><a style="text-decoration: none" href="/curso/{{$cursos[0]->nome}}"></a><p class="texto-button"> - SAIBA MAIS - </p></div>
                    </div>
                </div>
                @endif

                {{--@if(isset($cursos[1]))--}}
                {{--<div class="item center-block">--}}
                    {{--<div class="contorno">--}}
                        {{--<img src="{{$cursos[1]->img}}" alt="CURSO" class="img-responsive center-block">--}}
                        {{--<h4 class="text-center" style="text-transform: uppercase"> {{$cursos[1]->titulo}} </h4>--}}
                        {{--<span class="descricao">{{$cursos[1]->discricao}}</span>--}}
                        {{--</br> <div class="buttom-custom-1"><a style="text-decoration: none" href="/curso/{{$cursos[1]->nome}}"></a><p class="texto-button"> - SAIBA MAIS - </p></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                 {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section> <!-- OK -->--}}

    <section id="colaboradores">
        <div class="container">

            {{--<button  type="button" id="b-left"><i class="fa fa-chevron-left"></i></button>--}}
            {{--<button  type="button" id="b-right"><i class="fa fa-chevron-right"></i></button>--}}

            <div class="row texto-ini">
                <h1 id="texto1">NOSSOS</h1>
                <h1 id="texto2">APOIADORES</h1>
            </div>

            <div class="col-md-4"></div>

            <div class="col-md-8">
                <div id="owl-demo-apoio" class="espacamento">
                 @if(count($patrocinio) > 0)
                    @foreach($patrocinio as $p)
                    <div class="item center-block item-custom"><img src="{{$p->img}}" alt="APOIO"></div>
                    @endforeach
                 @endif
                </div>
            </div>
        </div>
    </section>

    <div id="modal">
        <div id="float-banner" class="float-banner">
            <a href="/cursos-e-eventos" title="" data-toggle="tooltip" data-placement="left"><img src="/imagens/folder.jpg" style="max-width: 390px; max-height: 290px;"></a>
        </div>
        <div id="float-banner-close" class="float-banner-close">
            <a href="#"><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a>
        </div>
    </div>

@endsection