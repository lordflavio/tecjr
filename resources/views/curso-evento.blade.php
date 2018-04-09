@extends('layouts.tamplate-principal')
@section('content')
    <section id="p-cursos">
        <div class="container">
            <div class="row espacamento">
                <h1 class="text-center">Cursos Ofertados</h1>
                <hr class="h-custom">
                @if(count($cursos) > 0)
                @foreach($cursos as $curso)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img class="img-responsive" src="{{$curso->img}}" alt="{{$curso->titulo}}">
                        <h4 style="text-transform: uppercase">{{$curso->titulo}}</h4>
                        <div class="descricao-avancada">
                            <p>{{$curso->situacao}}</i></p>
                            <p><i class="fa fa-clock-o fa-lg" aria-hidden="true"> {{$curso->duracao}} Horas</i></p>
                            <p><i class="fa fa-ticket fa-lg" aria-hidden="true"> {{$curso->valorInscricao}} Reais</i></p>
                        </div>
                        <br>
                        <a href="/curso/{{$curso->nome}}" class="btn btn-primary col-xs-12" role="button">Saiba mais clique aqui!</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @endforeach
                @endif
                <div class="col-md-12">
                    <h1 class="text-center">Eventos</h1>
                    <hr class="h-custom">
                    @if(count($eventos) > 0)
                        @foreach($eventos as $evento)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img class="img-responsive" src="{{$evento->img}}" alt="LOGO" height="200px" width="320px">
                                    <h4 style="text-transform: uppercase">{{$evento->titulo}}</h4>
                                    <div class="descricao-avancada">
                                        {{--<p><i class="fa fa-clock-o fa-lg" aria-hidden="true"> -- Horas</i></p>--}}
                                        {{--<p><i class="fa fa-ticket fa-lg" aria-hidden="true"> --,-- Reais</i></p>--}}
                                    </div>
                                    <br>
                                    <a href="/eventos/{{$evento->nome}}" class="btn btn-primary col-xs-12" role="button">Saiba mais clique aqui!</a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        @endforeach
                    @endif
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
                <a href="/contato" style="text-decoration: none">
                    <button id="js-trigger-overlay" type="button">Contato</button>
                </a>
            </div>
        </div>
    </section>
@endsection