@extends('layouts.tamplate-system')

@section('content')
    <div class="container-fluid" style="margin-left: 15px">
        <div class="row">
            <section class="noticias">
                <div class="row col-md-12">
                    <h1 class="text-center"> Noticias </h1>
                    <p class="text-right"> <a type="button" data-toggle="modal" data-target="#noticia" class="btn btn-success btn-success-custom "> Adicionar Noticia  </a></p>
                    <hr>

                    <div class="row" style="margin-left: 15px">
                        @foreach($noticias as $noticia)
                        <div class="col-md-4" style="border: 1px solid #0A64C8">
                            <form action="{{route('home.noticias.delete',$noticia->id)}}" method="POST">
                                {{ method_field('POST')}}
                                {{ csrf_field() }}
                                <p class="text-center"><button  type="submit" class=" btn-danger">Excluir</button></p>
                            </form>
                            <img src="{{$noticia->img}}" width="320" alt="Image">
                            <p class="text-center">{{$noticia->titulo}}</p>
                            <p class="text-center">{{date("d-m-Y", strtotime($noticia->data))." "}}<i class="fa fa-calendar "></i></p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <hr>
            <section class="home-patrocinio">
                <div class="row col-md-12">
                    <h1 class="text-center"> Patrocinios </h1>
                    <hr>
                    @foreach($patrocinio as $pat)
                        <div class="col-md-2 " style="padding-bottom: 20px">
                            <img class=" img-rounded center-block " src="{{$pat->img}}" width="165" height="120" alt="Banner 1">
                            <form action="{{route('home.delete',$pat->id)}}" method="POST">
                                {{ method_field('POST')}}
                                {{ csrf_field() }}
                                <p class="text-center"><button  type="submit" class=" btn-danger">Excluir</button></p>
                            </form>
                        </div>
                    @endforeach
                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{route('home.patrocinio')}}" method="POST" enctype="multipart/form-data" >
                            {{ method_field('POST')}}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="propaganda">Upload Imagem</label>
                                <div class="col-md-4">
                                    <input id="propaganda" name="propaganda" class="input-file" type="file">
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="pro"></label>
                                <div class="col-md-4">
                                    <button style="width: 150px" id="pro" name="pro" class="btn btn-success btn-success-custom center-block">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <hr>
            <section>
                <div class="row col-md-12">
                    <h1 class="text-center"> Banes Pricipal </h1>
                    <hr>
                    <div class="col-md-4">
                        <img class="img-responsive img-thumbnail" src="/imagens/baner/01.jpg"  alt="Banner 1">
                    </div>
                    <div class="col-md-4">
                        <img class="img-responsive img-thumbnail" src="/imagens/baner/02.jpg" alt="Banner 2">
                    </div>
                    <div class="col-md-4">
                        <img class="img-responsive img-thumbnail" src="/imagens/baner/03.jpg" alt="Banner 3">
                    </div>

                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{route('home.baner')}}" method="POST" enctype="multipart/form-data" style="margin-top: 15px">
                        {{ method_field('POST')}}
                        {{ csrf_field() }}
                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="img">Substituir</label>
                                <div class="col-md-4">
                                    <select id="img" name="img" class="form-control">
                                        <option value="0">- Escolher número da imagem -</option>
                                        <option value="/imagens/baner/01">1</option>
                                        <option value="/imagens/baner/02">2</option>
                                        <option value="/imagens/baner/03">3</option>
                                    </select>
                                </div>
                            </div>

                            <!-- File Button -->
                            <div class="form-group ">
                                <label class="col-md-4 control-label" for="banner">Upload Imagem</label>
                                <div class="col-md-4">
                                    <input id="banner" name="banner" class="input-file" type="file">
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="pro"></label>
                                <div class="col-md-4">
                                    <button style="width: 150px" id="pro" name="pro" class="btn btn-success btn-success-custom center-block">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <br>
        </div>
    </div>


    {{--Noticias--}}
    <div class="modal fade" id="noticia" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Nova Noticia</h4>
                </div>
                <form action="{{route('home.noticias')}}" method="POST" enctype="multipart/form-data">
                    {{ method_field('POST')}}
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <section class="hast">
                            <div class="col-md-10">
                                <h3 class="dark-grey">Informações</h3><br>

                                <div class="form-group col-lg-6 has-feedback">
                                    <label>Titulo:</label>
                                    <input type="text" name="titulo" class="form-control" id="nome" value="">
                                    <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                                </div>

                                <div class="form-group col-lg-6 has-feedback">
                                    <label>Sub Titulo:</label>
                                    <input type="text" name="subtitulo" class="form-control" id="titulo" value="">
                                    <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                                </div>

                                <div class="form-group col-lg-6 has-feedback">
                                    <label>Autor:</label>
                                    <input type="text" name="autor" class="form-control" id="titulo" value="">
                                    <span class="fa fa-user-circle-o form-control-feedback form-control-feedback-custom"></span>
                                </div>

                                <div class="form-group col-lg-12 has-feedback ">
                                    <label >Descrição:</label>
                                    <textarea  name="discricao" class="form-control" style="height: 150px"  id="discricao" placeholder="Descrição..."></textarea>
                                    {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                                </div>

                                <div class="form-group col-md-8">
                                    <label class="col-md-12 control-label" for="img">Upload Imagem: <small> Resolução indicada : 760 X 400 pixels </small></label>
                                    <input id="img" name="img" class="input-file" type="file"></br>

                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="panel-footer" style="margin-bottom:-14px;">
                        <input type="submit" class="btn btn-success" value="Salvar"/>
                        <!--<span class="glyphicon glyphicon-remove"></span>-->
                        <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection