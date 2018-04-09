@extends('layouts.tamplate-system')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <form action="{{route('curso.store')}}" method="POST" enctype="multipart/form-data">
                {{ method_field('POST')}}
                {{ csrf_field() }}
                <h1 class="text-center h1-curso"> Novo Curso </h1>
                <hr>
                <section class="hast">
                        <div class="col-md-10">
                            <h3 class="dark-grey">Informações</h3><br>

                            <div class="form-group col-lg-6 has-feedback">
                                <label>Titulo:</label>
                                <input type="text" name="titulo" class="form-control" id="titulo" value="" required="">
                                <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                            </div>

                            <div class="form-group col-lg-6 has-feedback">
                                <label>Ministrante</label>
                                <input type="text" name="ministrante" class="form-control" id="ministrante" value="" required="">
                                <span class="glyphicon glyphicon-user form-control-feedback form-control-feedback-custom"></span>
                            </div>

                            <div class="form-group col-lg-4 has-feedback ">
                                <label >Data:</label>
                                <input type="date" name="dat" class="form-control"   id="dat" placeholder="dd/MM/dddd" required="">
                                <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                            </div>
                            <div class="form-group col-lg-4 has-feedback ">
                                <label >Valor de Inscricao:</label>
                                <input type="text" name="valorInscricao" class="form-control"   id="valorInscricao" required="">
                                <span class="fa fa-money form-control-feedback form-control-feedback-custom"></span>
                            </div>

                            <div class="form-group col-lg-2 has-feedback ">
                                <label >Horario:</label>
                                <input type="text" name="horario" class="form-control"   id="horario" required="">
                                <span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom" ></span>
                            </div>

                            <div class="form-group col-lg-2 has-feedback ">
                                <label >Duração:</label>
                                <input type="text" name="duracao" class="form-control"   id="duracao" required="">
                                <span class="fa fa-clock-o form-control-feedback form-control-feedback-custom"></span>
                            </div>

                            <div class="form-group col-lg-6 has-feedback ">
                                <label>Pré-requisitos:</label>
                                <textarea  name="preRequisitos" class="form-control" style="height: 100px"  id="preRequisitos" placeholder="Descrição..." required=""></textarea>
                                {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                            </div>

                            <div class="form-group col-lg-6 has-feedback ">
                                <label>Publico Alvo:</label>
                                <textarea  name="publicoAlvo" class="form-control" style="height: 100px"  id="publicoAlvo" placeholder="Descrição..." required=""></textarea>
                                {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                            </div>

                            <div class="form-group col-lg-6 has-feedback ">
                                <label >Objetivo:</label>
                                <textarea  name="objetivo" class="form-control" style="height: 100px"  id="objetivo" placeholder="Descrição..." required=""></textarea>
                                {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                            </div>

                            <div class="form-group col-lg-6 has-feedback ">
                                <label >Descrição:</label>
                                <textarea  name="discricao" class="form-control" style="height: 100px"  id="discricao" placeholder="Descrição..." required=""></textarea>
                                {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="img">Upload Imagem</label>
                                <input id="img" name="img" class="input-file" type="file">
                            </div>

                        </div>
                </section>
                <div>
                   <p class="text-center"> <button type="submit" class="btn btn-success btn-success-custom "> Criar Curso  </button> <a href="/system/curso" type="button" class="btn btn-success btn-success-custom ">Voltar</a> </p>
                </div>
            </form>
        </div>
    </div></br>


@endsection