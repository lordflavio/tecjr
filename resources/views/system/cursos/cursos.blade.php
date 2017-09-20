@extends('layouts.tamplate-system')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <h1 class="text-center h1-curso">  Cursos </h1>
            <hr>
            <!-- Boxes de Acoes -->
            <div class="hast">
                @foreach($cursos as $curso)
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <div><img class="img-rounded" src="{{$curso->img}}" width="120" height="100" alt="Curso"></div>
                            <div class="info">
                                <h3 class="title">{{$curso->titulo}}</h3>
                                <p class="text-left">
                                    {{$curso->discricao}}
                                </p>
                                <p><b>Data de realização:</b>{{$curso->data}}</p>
                                <p><b> Horario:</b> {{$curso->horario}}</p>
                                <div class="more">
                                    <a href="#" title="Title Link">
                                        Read More <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                                <div class="col-md-offset-10">
                                    <a href="{{route('cursoex.delete',$curso->id)}}" title="Remover">
                                        <i class="fa fa-bitbucket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-offset-4">
            <a type="button" href="{{route('curso.create')}}" class="btn btn-success btn-success-custom "><i class="fa fa-cubes"></i> Criar novo Curso  </a>
        </div>
        </br>
    </div>



@endsection