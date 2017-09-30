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
                                <h1 data-animation="animated zoomInRight">Bootstrap Carousel</h1>
                                <p data-animation="animated fadeInLeft">Bootstrap carousel now touch enable slide.</p>
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
                        <h1 data-animation="animated flipInX">Bootstrap touch slider</h1>
                        <p data-animation="animated lightSpeedIn">Make Bootstrap Better together.</p>
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
                        <h1 data-animation="animated zoomInLeft">Beautiful Animations</h1>
                        <p data-animation="animated fadeInRight">Lots of css3 Animations to make slide beautiful .</p>
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

    <section id="noticias">
        <div class="container">

            <div class="row topo_noticias">
                <h1>Noticias sobre a UPE</h1>
                <p id="subtitulo">If you are going to use a passage of Lorem Ipsum, you need to be </p>
            </div>

            @if(isset($noticias[0]))
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active">
                        <img src="{{$noticias[0]->img}}" width="760" height="400">
                        <div class="carousel-caption">
                            <h4>{{$noticias[0]->titulo}}</h4>
                            <p> {{$noticias[0]->descricao}} <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Saiba mais</a></p>
                        </div>
                    </div><!-- End Item -->

                    @if(count($noticias) < 5)
                        @for($i = 1; $i < count($noticias); $i++)
                        <div class="item">
                            <img src="{{$noticias[$i]->img}}" width="760" height="400">
                            <div class="carousel-caption">
                                <h4>{{$noticias[$i]->titulo}}</h4>
                                <p> {{$noticias[$i]->descricao}} <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Saiba mais</a></p>
                            </div>
                        </div><!-- End Item -->
                        @endfor
                    @elseif(count($noticias) > 5)
                        @for($j = 1; $j < 5; $j++)
                        <div class="item">
                            <img src="{{$noticias[$j]->img}}" width="760" height="400">
                            <div class="carousel-caption">
                                <h4>{{$noticias[$j]->titulo}}</h4>
                                <p> {{$noticias[$j]->descricao}} <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Saiba mais</a></p>
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
            @endif
        </div>
    </section><!-- OK -->

    <section id="equipe">
        <div class="container">
            <div class="row cabecalho_secao">
                <h1>Nossa equipe</h1>
                <p>Pessoas por trás dessa empresa</p>
            </div>

            {{--<button  type="button" id="b-equipe-left"><i class="fa fa-chevron-left"></i></button>--}}
            {{--<button  type="button" id="b-equipe-right"><i class="fa fa-chevron-right"></i></button>--}}

            <div id="owl-demo" class="espacamento">
             @if(count($gestao) > 0)
                @foreach($gestao as $ges)
                <div class="item center-block">
                    <img src="{{$ges->img}}" alt="pessoa1" class="img-responsive img-thumbnail">
                    <div class="descricao-membros">
                        <h4> {{$ges->nome}} </h4>
                        <span class="funcao"> - {{$ges->cargo}} - </span>
                        <h4 class="widget-title">Siga-me nas redes sociais</h4>
                        <ul class="social-nav col-md-offset-2  col-sm-offset-2 col-xs-offset-1 ">
                            <li><a href="{{$ges->twitter}}" target="_blank" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$ges->face}}" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$ges->gmail}}" target="_blank" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="{{$ges->twitter}}" target="_blank" title="Linkedin" rel="nofollow" class="linkedin"><i class="fa fa-whatsapp"></i></a></li>
                            {{--<li><a href="#" target="_blank" title="Pinterest" rel="nofollow" class="pinterest"><i class="fa fa-pinterest"></i></a></li>--}}
                        </ul>
                    </div>
                </div>
                @endforeach
             @endif
            </div>
        </div>

    </section>  <!-- OK -->

    <section id="cursos">
        <div class="container">

            <div class="row cabecalho_secao">
                <h1>Cursos e Eventos</h1>
                <p>Entre em contato conosco para saber mais.</p>
            </div>

            {{--<button  type="button" id="b-cursos-left"><i class="fa fa-chevron-left"></i></button>--}}
            {{--<button  type="button" id="b-cursos-right"><i class="fa fa-chevron-right"></i></button>--}}

            <div id="owl-demo-3" class="espacamento">

                <div class="item  center-block">
                    <div class="contorno">
                        <img src="http://1.bp.blogspot.com/-LBPMhqvvas4/VXYmKRqGTRI/AAAAAAAAG0A/98RuYbdVfoE/s1600/logo%2Bevento.jpg" alt="pessoa1" class="img-responsive center-block">
                        <h4 class="text-center"> COMBINATIVIDADE </h4>
                        <span class="descricao">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth,</span>
                        </br><div class="center-block buttom-custom-1 "><p class="texto-button"> - SAIBA MAIS - </p></div>
                    </div>
                </div>
                <div class="item center-block">
                    <div class="contorno">
                        <img src="https://s-media-cache-ak0.pinimg.com/originals/d4/26/9c/d4269cb720d3e94bf55a62f0c35faaf7.jpg" alt="pessoa1" class="img-responsive center-block">
                        <h4 class="text-center"> JAVA - MODULO 1 </h4>
                        <span class="descricao">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth,</span>
                        </br> <div class="buttom-custom-1"><p class="texto-button"> - SAIBA MAIS - </p></div>
                    </div>
                </div>
                <div class="item center-block">
                    <div class="contorno">
                        <img src="https://www.sololearn.com/Icons/Courses/1073.png" alt="pessoa1" class="img-responsive center-block">
                        <h4 class="text-center"> PYTHON - MODULO 1 </h4>
                        <span class="descricao">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth,</span>
                        </br> <div class="buttom-custom-1"><p class="texto-button"> - SAIBA MAIS - </p></div>
                    </div>
                </div>

                <div class="item center-block">
                    <div class="contorno">
                        <img src="https://www.sololearn.com/Icons/Courses/1073.png" alt="pessoa1" class="img-responsive center-block">
                        <h4 class="text-center"> PYTHON - MODULO 1 </h4>
                        <span class="descricao">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth,</span>
                        </br> <div class="buttom-custom-1"><p class="texto-button"> - SAIBA MAIS - </p></div>
                    </div>
                </div>

            </div>
        </div>
    </section> <!-- OK -->

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

@endsection