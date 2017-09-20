@extends('layouts.tamplate-system')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <h1 class="text-center h1-curso"> Eventos  </h1>
            <hr>
            <div class="hast">
                <!-- Boxes de Acoes -->
                @foreach($eventos as $evento)
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="box">
                            <div class="icon">
                                <div><img class="img-rounded" src="{{$evento->img}}" width="120" height="100" alt="Curso"></div>
                                <div class="info">

                                    <h3 class="title">{{$evento->nome}}</h3>
                                    <p class="text-left"><b>Data de Inicio realização: </b>{{$evento->dateInicioEx}}</p>
                                    <p class="text-left"><b>Data de Fim realização: </b>{{$evento->dateFimEx}}</p>
                                    <p class="text-left"><b>Data de Inicio de Inscrições: </b>{{$evento->dateInicioIns}}</p>
                                    <p class="text-left"><b>Data de Fim de Inscrições: </b>{{$evento->dateFimIns}}</p>
                                    <div class="more">
                                        <a href="{{route('evento.show',$evento->id)}}" title="Ver Atividades">
                                            Ver Atividades <i class="fa fa-angle-double-right"></i>
                                        </a>
                                        <div class="col-md-offset-10">
                                            <a href="{{route('eventoex.delete',$evento->id)}}" title="Remover">
                                                <i class="fa fa-bitbucket"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                            </div>
                            <div class="space"></div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-offset-4">
                <a type="button" href="{{route('evento.create')}}" class="btn btn-success btn-success-custom  "><i class="fa fa-archive"></i> Criar novo Evento  </a>
            </div></br>
        </div>
    </div>
@endsection