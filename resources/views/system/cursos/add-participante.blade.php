@extends('layouts.tamplate-system')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <h1 class="text-center"> Usuarios  </h1>]
            <hr>
            <div class="col-lg-12">
                <img class="center-block" src="{{$participante->img}}" width="100" alt="Participante">
                <p class="text-center"><b>Nome: </b>{{$participante->nome}}</p>
                <p class="text-center"><b>CPF: </b>{{$participante->cpf}}</p>
                <p class="text-center"><a href="{{'/system/add-part/'.$curso->id.'/'.$participante->id}}"  type="button" class="btn btn-success btn-success-custom" style="margin: 0">Adicionar</a><a href="{{route('curso.show',$curso->id)}}" type="button" class="btn btn-success btn-success-custom" style="margin: 0">Voltar</a></p>
            </div>
        </div>
    </div>

@endsection