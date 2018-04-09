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

                        <div class="form-group col-lg-6 has-feedback">
                            <label>Titulo:</label>
                            <input type="text" name="nome" class="form-control" id="nome" value="" placeholder="Titulo do Evento">
                            <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-6 has-feedback">
                            <label>Google Map:</label>
                            <input type="text" name="map" class="form-control" id="map" value="" placeholder="Link <inframe> do google map">
                            <span class="fa fa-map-marker form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-6 has-feedback">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" id="email" value="" placeholder="Email oficial do evento">
                            <span class="fa fa-envelope form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-6 has-feedback">
                            <label>Telefone:</label>
                            <input type="text" name="fone" class="form-control" id="fone">
                            <span class="fa fa-phone form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-6 has-feedback ">
                            <label >Data Inicio Realiação do Evento:</label>
                            <input type="date" name="dateInicioEx" class="form-control"   id="dateInicioEx" placeholder="dd/MM/dddd">
                            <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-6 has-feedback ">
                            <label >Data Fim Realiação do Evento:</label>
                            <input type="date" name="dateFimEx" class="form-control"   id="dateFimEx" placeholder="dd/MM/dddd">
                            <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-6 has-feedback ">
                            <label >Data: Inscrição do Evento</label>
                            <input type="date" name="dateInicioIns" class="form-control"   id="dateInicioIns" placeholder="dd/MM/dddd">
                            <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-6 has-feedback ">
                            <label >Data: Inscrição do Evento</label>
                            <input type="date" name="dateFimIns" class="form-control"   id="dateFimIns" placeholder="dd/MM/dddd">
                            <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-6 has-feedback ">
                            <label >Sobre o Evento:</label>
                            <textarea  name="sobre" class="form-control" style="height: 100px"  id="sobre" placeholder="Descrição..."></textarea>
                            {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                        </div>

                        <div class="form-group col-lg-6 has-feedback ">
                            <label >Procedimento de inscrição:</label>
                            <textarea  name="descIns" class="form-control" style="height: 100px"  id="descIns" placeholder="Descrição..."></textarea>
                            {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                        </div>
                        <hr>
                        <h3 class="dark-grey">Endereço:</h3><br>

                        <div class="form-group col-lg-5 has-feedback ">
                            <label > CEP </label>
                            <input type="text" name="cep" class="form-control"  id="cep">
                            <span class="fa fa-thumb-tack form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-5 has-feedback">
                            <label>Endereço</label>
                            <input type="text" name="endereco" class="form-control" id="end">
                        </div>
                        <div class="form-group col-lg-2 has-feedback">
                            <label>Número</label>
                            <input type="text" name="numero" onkeyup="somenteNumeros(this);" maxlength="5" class="form-control" id="numero">
                        </div>

                        <div class="form-group col-lg-5 has-feedback">
                            <label>Cidade</label>
                            <input type="text" name="cidade" class="form-control" id="cidade">
                        </div>

                        <div class="form-group col-lg-5 ">
                            <label>Bairro</label>
                            <input type="text" name="bairro" class="form-control" id="bairro">
                        </div>

                        <div class="form-group col-lg-2 has-feedback">
                            <label>Estado</label>
                            <input type="text" name="estado" class="form-control" id="estado">
                        </div>
                        
                        <div class="form-group col-lg-4 has-feedback ">
                                <label >Valor de Inscricao:</label>
                                <input type="text" name="valorInscricao" class="form-control"   id="valorInscricao" >
                                <span class="fa fa-money form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-8 ">
                            <label class="col-md-3 control-label" for="img">Upload Imagem</label>
                            <input id="img" name="img" class="input-file" type="file">
                        </div>
                    </div>
                </section>
                <div>
                   <p class="text-center"><button type="submit" class="btn btn-success btn-success-custom "> Criar Evento  </button> <a href="/system/curso" type="button" class="btn btn-success btn-success-custom ">Voltar</a></p>
                </div>
            </form>
        </div>
    </div></br>
@endsection