@extends('layouts.tamplate-principal')
@section('content')
    <section id="p-cursos">
        <div class="container">
            <div class="row espacamento">
                <h1 class="text-center">Cursos Ofertados</h1>
                <hr class="h-custom">
                @foreach($cursos as $curso)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img class="img-responsive" src="{{$curso->img}}" alt="{{$curso->titulo}}">
                        <h4 style="text-transform: uppercase">{{$curso->titulo}}</h4>
                        <span class="descricao-curso"> {{$curso->discricao}} </span>
                        <div class="descricao-avancada">
                            <p><i class="fa fa-clock-o fa-lg" aria-hidden="true"> {{$curso->duracao}} Horas</i></p>
                            <p><i class="fa fa-ticket fa-lg" aria-hidden="true"> {{$curso->valorInscricao}} Reais</i></p>
                        </div>
                        <br>
                        <a href="/curso/{{$curso->nome}}" class="btn btn-primary col-xs-12" role="button">Increver-se</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-12">
                    <h1 class="text-center">Eventos</h1>
                    <hr class="h-custom">
                    @for($i = 0; $i < 3; $i++)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img class="img-responsive" src="imagens/contato.png" alt="..." height="200px" width="320px">
                                <h4>DESENVOLVIMENTO WEB <br> MÓDULO I</h4>
                                <span class="descricao-curso">Amet assumenda ea eaque eius iusto minus pariatur. Aut consectetur consequatur cumque esse eum exercitationem facere id nisi ratione reiciendis. Mollitia, ut.</span>
                                <div class="descricao-avancada">
                                    <p><i class="fa fa-clock-o fa-lg" aria-hidden="true"> -- Horas</i></p>
                                    <p><i class="fa fa-ticket fa-lg" aria-hidden="true"> --,-- Reais</i></p>
                                </div>
                                <br>
                                <a href="#" class="btn btn-primary col-xs-12" role="button">View Snippet</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    @endfor
            </div>
            </div>
        </div>
    </section>


    <section id="p-cursos-outros">
        <div class="container">
            <div class="row espacamento">
                <h1>Não encontrou o curso que deseja? <br>Entre em contato conosco!</h1>
            </div>
            <div>
                <button id="js-trigger-overlay" type="button">Contato</button>
            </div>
        </div>
    </section>
@endsection