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
        <ul class="seven">
            @if(count($gestao) > 0)
                @for($i=0;$i< count($gestao); $i++)
                    <li class="transition">
                        <div class="wrapper">
                            <ul class="social transition">
                                <li class="transition"><a href="{{$gestao[$i]->twitter}}"><i class="fa fa-twitter-square fa-2x"></i></a></li>
                                <li class="transition"><a href="#" title="{{$gestao[$i]->whatsapp}}"><i class="fa fa-whatsapp fa-2x"></i></a></li>
                                <li class="transition"><a href="{{$gestao[$i]->face}}"><i class="fa fa-facebook-square fa-2x"></i></a></li>
                                <li class="transition"><a href="{{$gestao[$i]->gmail}}"><i class="fa fa-envelope fa-2x"></i></a></li>
                            </ul>
                            <span class="transition">
                                <h3 class="transition"> <?php echo $gestao[$i]->nome;  ?> <em> {{$gestao[$i]->cargo}} </em></h3>
                                <img class="transition" src="{{$gestao[$i]->img}}" width="120">
                                <h4 class="transition">Contact me:</h4>
                            </span>
                            <div class="arrow"></div>
                        </div>
                    </li>
                @endfor


            @endif
        </ul>


    </section>



    <section id="cursos">
        <div class="container">
            <div class="espacamento">
                <h1 class="titulo-secao">Cursos e Eventos</h1>
            </div>

            <div class="row">
                @for($i = 0; $i< count($cursos); $i++)
                <div class="col-sm-6 col-md-6 col-lg-4 mt-4">
                    <div class="card card-inverse card-info">
                        <img class="card-img-top" src="{{$cursos[$i]->img}}">
                        <div class="card-block">
                            <h4 class="card-title">{{$cursos[$i]->nome}}</h4>
                            <div class="card-text">
                                {{$cursos[$i]->descricao}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/curso/{{$cursos[$i]->nome}}" type="button" class="btn btn-info2 btn-sm center-block">Saiba Mais</a>
                        </div>
                    </div>
                </div>
                @endfor

                    @for($i = 0; $i< count($evento); $i++)
                        <div class="col-sm-6 col-md-6 col-lg-4 mt-4">
                            <div class="card card-inverse card-info">
                                <img class="card-img-top" src="{{$evento[$i]->img}}">
                                <div class="card-block">
                                    <h4 class="card-title">{{$evento[$i]->titulo}}</h4>
                                    <div class="card-text">
                                        {{$evento[$i]->descricao}}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="/eventos/{{$evento[$i]->nome}}" type="button" class="btn btn-info2 btn-sm center-block">Saiba Mais</a>
                                </div>
                            </div>
                        </div>
                    @endfor

            </div>

        </div>
    </section>



    <section id="colaboradores">
        <div class="container">
            <div class="espacamento">
                <h1>Colaboradores</h1>
            </div>

            <div class="imagens-colaboradores">
                <div class="imagens col-md-12">
                    @foreach($patrocinio as $p)
                    <div class="col-md-4">
                        <img src="{{$p->img}}" width="270" height="200" alt="fail">
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <!---
    <div id="modal">
        <div id="float-banner" class="float-banner">
            <a href="/cursos-e-eventos" title="" data-toggle="tooltip" data-placement="left"><img src="/imagens/folder.jpg" style="max-width: 390px; max-height: 290px;"></a>
        </div>
        <div id="float-banner-close" class="float-banner-close">
            <a href="#"><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a>
        </div>
    </div>
    -->

@endsection