@extends('layouts.tamplate-system')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{route('evento.store')}}" method="POST" enctype="multipart/form-data">
                {{ method_field('POST')}}
                {{ csrf_field() }}
                <h1 class="text-center h1-curso"> Novo Evento </h1>
                <hr>
                <section class="hast">
                    <div class="col-md-10">
                        <h3 class="dark-grey">Informações Principais do  Evento</h3><br>

                        <input type="text" name="status" style="display: none;" class="form-control" id="status" value="false">

                        <div class="form-group col-lg-10 has-feedback">
                            <label>Titulo:</label>
                            <input type="text" name="nome" class="form-control" id="nome" value="">
                            <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-5 has-feedback ">
                            <label >Data Inicio Realiação do Evento:</label>
                            <input type="date" name="dateInicioEx" class="form-control"   id="dateInicioEx" placeholder="dd/MM/dddd">
                            <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-5 has-feedback ">
                            <label >Data Fim Realiação do Evento:</label>
                            <input type="date" name="dateFimEx" class="form-control"   id="dateFimEx" placeholder="dd/MM/dddd">
                            <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-5 has-feedback ">
                            <label >Data: Inscrição do Evento</label>
                            <input type="date" name="dateInicioIns" class="form-control"   id="dateInicioIns" placeholder="dd/MM/dddd">
                            <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-5 has-feedback ">
                            <label >Data: Inscrição do Evento</label>
                            <input type="date" name="dateFimIns" class="form-control"   id="dateFimIns" placeholder="dd/MM/dddd">
                            <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                        </div>
                        <div class="form-group col-lg-10 ">
                            <label class="col-md-3 control-label" for="img">Upload Imagem</label>
                            <input id="img" name="img" class="input-file" type="file">
                        </div>
                    </div>
                </section>
                <div>
                   <p class="text-center"><button type="submit" class="btn btn-success btn-success-custom "><i class="fa fa-plus-square-o pull-right"></i> Criar Evento  </button></p>
                </div>
            </form>
        </div>
    </div></br>
@endsection