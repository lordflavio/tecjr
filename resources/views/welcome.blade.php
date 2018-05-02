@extends('layouts.tamplate-principal')

@section('content')
    <section id="inicio">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <div class="item carousel-item active">
                                <img src="{{$noticias[0]->img}}" alt="" style="width: 100%">
                                <div class="carousel-caption">
                                    <h3>{{$noticias[0]->titulo}}</h3>
                                    <p class="text-justify">{{$noticias[0]->descricao}}</p>
                                </div>
                            </div>
                            @for($i = 1; $i < count($noticias); $i++)
                            <div class="item carousel-item">
                                <img src="/examples/images/slides/tablet.jpg" alt="">
                                <img src="{{$noticias[$i]->img}}" alt="" style="width: 100%">
                                <div class="carousel-caption">
                                    <h3>{{$noticias[$i]->titulo}}</h3>
                                    <p class="text-justify">{{$noticias[0]->descricao}}</p>
                                </div>
                            </div>
                            @endfor
                        </div>
                        <!-- End Carousel Inner -->
                        <ul class="nav nav-pills nav-justified">
                            <li data-target="#myCarousel" data-slide-to="0" class="nav-item active"><a href="#" class="nav-link"><strong>Notícias</strong>{{date("d/m/Y", strtotime($noticias[0]->data))}} </a></li>
                            @for($i = 1; $i < count($noticias); $i++)
                            <li data-target="#myCarousel" data-slide-to="{{$i}}" class="nav-item"><a href="#" class="nav-link"><strong>Noticías</strong>{{date("d/m/Y", strtotime($noticias[$i]->data))}} </a></li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                                <h4 class="card-title">{{$cursos[$i]->titulo}}</h4>
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
@endsection

