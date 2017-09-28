@extends('layouts.tamplate-system')

@section('content')
    <div class="container-fluid" style="margin-left: 15px">
        <section>
            <div class="row">
                <h1 class="text-center"> Noticias </h1>
                <hr>
            </div>
        </section>

        <section>
            <div class="row">
                <h1 class="text-center"> Patrocinios </h1>
                <hr>
                @for($i = 0; $i < 12; $i++)
                <div class="col-md-2" style="padding-bottom: 20px">
                    <img class=" img-rounded " src="/imagens/escritorio.jpg" width="175" height="120" alt="Banner 1">
                </div>
                @endfor
            </div>
        </section>

        <section>
            <div class="row">
                <h1 class="text-center"> Banes Pricipal </h1>
                <hr>
                <div class="col-md-4">
                    <img class="img-responsive img-thumbnail" src="/imagens/pessoa.jpg"  alt="Banner 1">
                </div>
                <div class="col-md-4">
                    <img class="img-responsive img-thumbnail" src="/imagens/pessoa.jpg" alt="Banner 2">
                </div>
                <div class="col-md-4">
                    <img class="img-responsive img-thumbnail" src="/imagens/pessoa.jpg" alt="Banner 3">
                </div>
                <form action=""></form>
            </div>
        </section>
        <br>
    </div>
@endsection