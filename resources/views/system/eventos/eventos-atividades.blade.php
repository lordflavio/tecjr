@extends('layouts.tamplate-system')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="hast">
                <h1 style="margin-top: -50px;" class="text-center h1-curso"> Atividade do Evento: {{$evento->titulo}} </h1>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#atividades">Atividades</a></li>
                    <li><a data-toggle="tab" href="#submissao">Submissão</a></li>
                    <li><a data-toggle="tab" href="#patrocinio">Patrocinio</a></li>
                    <li><a data-toggle="tab" href="#palestrantes">Palestrantes</a></li>
                    <li><a data-toggle="tab" href="#programacao">Programação</a></li>
                    <li><a data-toggle="tab" href="#banner">Banner Principal</a></li>
                    <li><a data-toggle="tab" href="#edite">Editar</a></li>
                    {{--<li><a data-toggle="tab" href="#menu2">Archivos de Registro</a></li>--}}
                </ul>

                <div class="tab-content">
                    <div id="atividades" class="tab-pane fade in active even">
                        <P class="text-right" style="margin-right: 10px;"><button type="button" data-toggle="modal" data-target="#contact"  class="btn btn-success btn-success-custom "><i class="fa fa-archive"></i> Nova Atividade </button></P>
                        <hr>
                        <!-- Boxes de Acoes -->
                        @foreach($atividades as $atividade)
                            <div class="col-xs-12 col-sm-6 col-lg-4" style="margin-top: 20px">
                                <div class="box">
                                    <div class="icon">
                                        <div class="info">
                                            <h3 class="title">{{$atividade->titulo}}</h3>
                                            <p class="text-left"><b>Area: </b>{{$atividade->area}}</p>
                                            <p class="text-left"><b>Modalidade: </b>{{$atividade->modalidade}}</p>
                                            <p class="text-left"><b>Data: </b>{{ date("d-m-Y", strtotime($atividade->data)) }} <b style="margin-left: 20px"> Horario: </b>{{$atividade->horario}}</p>
                                            <p class="text-left"><b>Cordenação: </b>{{$atividade->cordenacao}}</p>
                                            <p class="text-left"><b>Convidados: </b>{{$atividade->convidados}}</p>
                                            <p class="text-left"><b>Palestrantes: </b>{{$atividade->palestrante}}</p>
                                            <p class="text-left"><b>Local: </b>{{$atividade->local}}</p>
                                            <div class="more">
                                                <a style="cursor: pointer;" type="button" data-toggle="modal" data-target="{{'#atividade'.$atividade->id}}"  title="Editar">
                                                    Edite
                                                </a>
                                            </div>
                                            <div class="col-md-offset-10">
                                                <a  href="{{'/system/evento-atividade/'.$atividade->id.'/'. $evento->id}}" title="Remover">
                                                    <i class="fa fa-bitbucket "></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space"></div>
                                </div>
                            </div>
                            <div class="modal fade" id="{{'atividade'.$atividade->id}}" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Adicionar uma nova atividade: {{$evento->titulo}}</h4>
                                        </div>
                                        <form action="{{route('evento-atividade.update',$atividade->id)}}" method="post">
                                            {{ method_field('POST')}}
                                            {{ csrf_field() }}
                                            <div class="panel-body">
                                                <section class="hast">
                                                    <div class="col-md-12">
                                                        <h3 class="dark-grey">Informações Atividade</h3><br>

                                                        <input type="text" name="eventoId" style="display: none;" class="form-control" id="eventoId" value="{{$evento->id}}">

                                                        <div class="form-group col-lg-10 has-feedback">
                                                            <label>Titulo:</label>
                                                            <input type="text" name="titulo" class="form-control" id="titulo" value="{{$atividade->titulo}}" required="">
                                                            <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                                                        </div>

                                                        <div class="form-group col-lg-5 has-feedback">
                                                            <label>Cordenação:</label>
                                                            <input type="text" name="cordenacao" class="form-control" id="cordenacao" value="{{$atividade->cordenacao}}">
                                                            {{--<span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>--}}
                                                        </div>

                                                        <div class="form-group col-lg-5 has-feedback">
                                                            <label>Palestrante:</label>
                                                            <input type="text" name="palestrante" class="form-control" id="palestrante" value="{{$atividade->palestrante}}">
                                                            <span class="fa fa-user-circle-o form-control-feedback form-control-feedback-custom"></span>
                                                        </div>

                                                        <div class="form-group col-lg-5 has-feedback">
                                                            <label>Área:</label>
                                                            <select id="area" name="area" onclick="combobox()" class="form-control">
                                                                <option value="{{($atividade->area != "") ? $atividade->area : ""}}"> {{($atividade->area != "") ? $atividade->area : "- Selecione -"}} </option>
                                                                <option value="CIÊNCIAS EXATAS E DA TERRA">CIÊNCIAS EXATAS E DA TERRA</option>
                                                                <option value="CIÊNCIAS BIOLÓGICAS">CIÊNCIAS BIOLÓGICAS</option>
                                                                <option value="ENGENHARIAS">ENGENHARIAS</option>
                                                                <option value="CIÊNCIAS DA SAÚDE">CIÊNCIAS DA SAÚDE</option>
                                                                <option value="CIÊNCIAS AGRÁRIAS">CIÊNCIAS AGRÁRIAS</option>
                                                                <option value="CIÊNCIAS SOCIAIS APLICADAS">CIÊNCIAS SOCIAIS APLICADAS</option>
                                                                <option value="CIÊNCIAS HUMANAS">CIÊNCIAS HUMANAS</option>
                                                                <option value="LINGÜÍSTICA, LETRAS E ARTES">LINGÜÍSTICA, LETRAS E ARTES</option>
                                                                <option value="OUTRAS">OUTRAS</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-lg-5 has-feedback">
                                                            <label>Modalidade:</label>
                                                            <select id="modalidade" name="modalidade" onclick="combobox()" class="form-control">
                                                                <option value="{{($atividade->modalidade) ? $atividade->modalidade : "" }}"> {{($atividade->modalidade) ? $atividade->modalidade : "- Selecione -" }} </option>
                                                                <option value="Palestra">PALESTRA</option>
                                                                <option value="Minicurso">MINICURSO</option>
                                                                <option value="Mesa Redonda">MESA REDONDA</option>
                                                                <option value="Entreterimento">ENTRETERIMENTO</option>
                                                                <option value="Outras">OUTRAS</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-lg-5 has-feedback ">
                                                            <label >Data: {{date("d-m-Y", strtotime($atividade->data))}} </label>
                                                            <input type="date" name="data" class="form-control"   id="data" placeholder="dd/MM/dddd">
                                                            <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                                                        </div>

                                                        <div class="form-group col-lg-5 has-feedback ">
                                                            <label >Horario:</label>
                                                            <input type="text" name="horario" class="form-control" value="{{$atividade->horario}}"  id="horario" placeholder="HH:MM" required="">
                                                            <span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>
                                                        </div>

                                                        <div class="form-group col-lg-5 has-feedback ">
                                                            <label >Convidados:</label>
                                                            <input type="text" name="convidados" class="form-control" value="{{$atividade->convidados}}"   id="convidados">
                                                            {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                                                        </div>

                                                        <div class="form-group col-lg-5 has-feedback ">
                                                            <label >Local de Realização:</label>
                                                            <input type="text" name="local" class="form-control" value="{{$atividade->local}}"   id="local" placeholder="Ex: Sala 01" required="">
                                                            {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
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

                        @endforeach
                    </div>

                    <div id="submissao" class="tab-pane fade">
                        <h1 class="text-center"> Submissão </h1><br>
                        <form action="{{route('evento.submissao',$evento->id)}}" method="post">
                            {{ method_field('POST')}}
                            {{ csrf_field() }}
                            <section>
                                <div class="col-md-10">
                                    <h3 class="dark-grey">Informações Submissão</h3><br>

                                    <div class="form-group col-lg-7 has-feedback ">
                                        <label >Link:</label>
                                        <input type="text" name="link" class="form-control" value="{{(count($submissao) > 0) ? $submissao[0]->link : "" }}"  id="link" placeholder="Link">
                                        <span class="fa fa-link form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-7 has-feedback ">
                                        <label >Resumo:</label>
                                        <textarea  name="resumo" class="form-control" style="height: 150px"  id="resumo" placeholder="Resumo...">{{(count($submissao) > 0) ? $submissao[0]->descricao : "" }}</textarea>
                                        {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p class="text-center"><button type="submit" class="btn btn-success btn-success-custom "> Enviar  </button></p>
                                </div>
                            </section>
                        </form>
                    </div>

                    <div id="palestrantes" class="tab-pane fade">
                        <form action="{{route('evento.palestrante',$evento->id)}}" method="post" enctype="multipart/form-data">
                            {{ method_field('POST')}}
                            {{ csrf_field() }}
                            <section>
                                <div class="col-md-10">
                                    <h3 class="dark-grey">Informações Principais do  Evento</h3><br>

                                    <div class="form-group col-lg-6 has-feedback">
                                        <label>Nome:</label>
                                        <input type="text" name="nome" class="form-control" id="nome" value="" placeholder="Titulo do Evento">
                                        <span class="fa fa-user-circle-o form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback">
                                        <label>Atividade:</label>
                                        <input type="text" name="atividade" class="form-control" id="atividade" value="" placeholder="Atividade no evento">
                                        <span class="fa fa-puzzle-piece form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback">
                                        <label>Formação Acadêmica:</label>
                                        <input type="text" name="formacao" class="form-control" id="formacao" value="" placeholder="Formação Acadêmica">
                                        <span class="fa fa-graduation-cap form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback">
                                        <label>Lattes:</label>
                                        <input type="text" name="lattes" class="form-control" id="lattes" value="" placeholder="Link plataforma lattes">
                                        <span class="fa fa-external-link form-control-feedback form-control-feedback-custom"></span>
                                    </div>
                                    <div class="form-group col-lg-12 ">
                                        <label class="col-md-2 control-label" for="img">Upload Imagem</label>
                                        <input id="img" name="img" class="input-file" type="file">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <p class="text-center"><button type="submit" class="btn btn-success btn-success-custom "> Adicionar  </button></p>
                                </div>
                            </section>
                        </form>

                        <hr>
                        <div class="col-md-12">
                            <h3 style="margin-top: 20px" class="text-left">Palestrantes do Evento</h3>
                            <div class="col-md-12">
                                @foreach($palestrante as $pal)
                                    <div class="col-md-3 " style="padding-bottom: 20px">
                                        <img class=" img-circle center-block " src="{{$pal->img}}" width="120" height="120" alt="Banner 1">
                                        <p><b>Nome:</b>{{$pal->nome}}</p>
                                        <p><b>Atividade:</b>{{$pal->atividade}}</p>
                                        <p><b>Formacao:</b>{{$pal->formacao}}</p>
                                        {{ method_field('POST')}}
                                        {{ csrf_field() }}
                                        <p class="text-center"><a data-toggle="modal" data-target="{{'#palestrante'.$pal->id}}"><button type="button" class=" btn-info">Editar</button></a>
                                            <a href="{{'/system/evento-palestrante-delete/'.$pal->id.'/'.$evento->id}}"> <button type="button" class=" btn-danger">Excluir</button></a></p>
                                    </div>

                                    <div class="modal fade" id="{{'palestrante'.$pal->id}}" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Editar Palestrante {{$pal->nome}}</h4>
                                                </div>
                                                <form action="{{'/system/evento-palestrante-update/'.$pal->id.'/'.$evento->id}}" method="post" enctype="multipart/form-data" >
                                                    {{ method_field('POST')}}
                                                    {{ csrf_field() }}
                                                    <div class="panel-body">
                                                        <section class="hast">
                                                            <div class="col-md-10">
                                                                <h3 class="dark-grey">Editar Palestrante</h3><br>

                                                                <div class="form-group col-lg-6 has-feedback">
                                                                    <label>Nome:</label>
                                                                    <input type="text" name="nome" class="form-control" id="nome" value="{{$pal->nome}}" placeholder="Titulo do Evento">
                                                                    <span class="fa fa-user-circle-o form-control-feedback form-control-feedback-custom"></span>
                                                                </div>

                                                                <div class="form-group col-lg-6 has-feedback">
                                                                    <label>Atividade:</label>
                                                                    <input type="text" name="atividade" class="form-control" id="atividade" value="{{$pal->atividade}}" placeholder="Atividade no evento">
                                                                    <span class="fa fa-puzzle-piece form-control-feedback form-control-feedback-custom"></span>
                                                                </div>

                                                                <div class="form-group col-lg-6 has-feedback">
                                                                    <label>Formação Acadêmica:</label>
                                                                    <input type="text" name="formacao" class="form-control" id="formacao" value="{{$pal->formacao}}" placeholder="Formação Acadêmica">
                                                                    <span class="fa fa-graduation-cap form-control-feedback form-control-feedback-custom"></span>
                                                                </div>

                                                                <div class="form-group col-lg-6 has-feedback">
                                                                    <label>Lattes:</label>
                                                                    <input type="text" name="lattes" class="form-control" id="lattes" value="{{$pal->lattes}}" placeholder="Link plataforma lattes">
                                                                    <span class="fa fa-external-link form-control-feedback form-control-feedback-custom"></span>
                                                                </div>
                                                                <div class="form-group col-lg-12 ">
                                                                    <label class="col-md-4 control-label" for="img">Mudar imagem</label>
                                                                    <input id="img" name="img" class="input-file" type="file">
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
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div id="patrocinio" class="tab-pane fade">
                        <h1 class="text-center"> Adicionar Patrocinador </h1><br>
                        <form action="{{route('evento.patrocinio',$evento->id)}}" method="post" enctype="multipart/form-data">
                            {{ method_field('POST')}}
                            {{ csrf_field() }}
                            <section>

                                <div class="col-md-10">
                                    <div class="form-group col-lg-12 ">
                                        <label class="col-md-4 control-label" for="img">Upload Logo do Patrocinio</label>
                                        <input id="img" name="img" class="input-file" type="file">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p class="text-center"><button type="submit" class="btn btn-success btn-success-custom "> Enviar  </button></p>
                                </div>
                            </section>
                        </form>

                        <div class="col-md-12" style="margin-top: 20px">
                            @foreach($patrocinio as $pat)
                                <div class="col-md-3 " style="padding-bottom: 20px">
                                    <img class=" img-thumbnail center-block " src="{{$pat->img}}" width="150" height="150" alt="Banner 1">
                                    <form action="{{'/system/evento-patrocinio-delete/'.$pat->id.'/'.$evento->id}}" method="POST">
                                        {{ method_field('POST')}}
                                        {{ csrf_field() }}
                                        <p class="text-center"> <button  type="submit" class=" btn-danger">Excluir </button></p>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="programacao" class="tab-pane fade">
                        <h1 class="text-center"> Programação </h1><br>
                        <form action="{{route('evento.programacao',$evento->id)}}" method="post">
                            {{ method_field('POST')}}
                            {{ csrf_field() }}
                            <section class="hast">
                                <div class="col-md-10">
                                    <h3 class="dark-grey text-center"> Adicionar Link de Download </h3><br>

                                    <div class="form-group col-lg-7 col-md-offset-4 has-feedback ">
                                        <label >Link:</label>
                                        <input type="text" name="programacao" class="form-control" value="{{ $evento->programacao }}"  id="programacao" placeholder="Link">
                                        <span class="fa fa-link form-control-feedback form-control-feedback-custom"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p class="text-center"><button type="submit" class="btn btn-success btn-success-custom "> Salva  </button></p>
                                </div>
                            </section>
                        </form>
                    </div>

                    <div id="banner" class="tab-pane fade">
                        <h1 class="text-center"> Banner Principal do Evento </h1><br>
                        <form action="{{route('evento.banner',$evento->id)}}" method="post" enctype="multipart/form-data">
                            {{ method_field('POST')}}
                            {{ csrf_field() }}
                            <section>
                                <div class="col-md-10">
                                    <div class="form-group col-md-offset-1 col-lg-12 ">
                                        <label class="col-md-6 control-label" for="img">Upload Imagem Resolução recomendada 1360 X 400 pixels </label>
                                        <input id="img" name="img" class="input-file" type="file">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p class="text-center"><button type="submit" class="btn btn-success btn-success-custom "> Salva  </button></p>
                                </div>
                            </section>
                        </form>

                        @if($evento->banner != "")
                            <div class="col-md-12">
                                <img class="img-responsive" src="{{$evento->banner}}" alt="Banner" width="100%">
                            </div>
                        @endif

                    </div>

                    <div id="edite" class="tab-pane fade">
                        <form style="margin-top: 30px" action="{{route('evento.update',$evento->id)}}" method="post" enctype="multipart/form-data">
                            {{ method_field('POST')}}
                            {{ csrf_field() }}
                            <section class="hast">
                                <div class="col-md-12">
                                    <img  class="center-block" src="{{$evento->img}}" alt="EVENTO IMG" width="200">
                                    <h3 class="dark-grey">Informações Principais do  Evento</h3><br>

                                    <div class="form-group col-lg-6 has-feedback">
                                        <label>Titulo:</label>
                                        <input type="text" name="nome"  class="form-control" id="nome" value="{{$evento->titulo}}" placeholder="Titulo do Evento">
                                        <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback">
                                        <label>Google Map:</label>
                                        <input type="text" name="map" class="form-control" id="map" value="{{$evento->map}}" placeholder="Link <inframe> do google map">
                                        <span class="fa fa-map-marker form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{$evento->email}}" placeholder="Email oficial do evento">
                                        <span class="fa fa-envelope form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback">
                                        <label>Telefone:</label>
                                        <input type="text" name="fone" value="{{$evento->fone}}" class="form-control" id="fone">
                                        <span class="fa fa-phone form-control-feedback form-control-feedback-custom"></span>
                                    </div>


                                    <div class="form-group col-lg-6 has-feedback ">
                                        <label >Data Inicio Realiação do Evento: {{ date("d/m/Y", strtotime($evento->dateInicioEx))}} </label>
                                        <input type="date" name="dateInicioEx" class="form-control"   id="dateInicioEx" placeholder="dd/MM/dddd">
                                        <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback ">
                                        <label >Data Fim Realiação do Evento: {{date("d/m/Y", strtotime($evento->dateFimEx))}} </label>
                                        <input type="date" name="dateFimEx" class="form-control"   id="dateFimEx" placeholder="dd/MM/dddd">
                                        <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback ">
                                        <label >Data: Inscrição do Evento: {{ date("d/m/Y", strtotime($evento->dateInicioIns))}}</label>
                                        <input type="date" name="dateInicioIns" class="form-control"   id="dateInicioIns" placeholder="dd/MM/dddd">
                                        <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback ">
                                        <label >Data: Inscrição do Evento: {{ date("d/m/Y", strtotime($evento->dateFimIns))}}</label>
                                        <input type="date" name="dateFimIns" class="form-control"   id="dateFimIns" placeholder="dd/MM/dddd">
                                        <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback ">
                                        <label >Sobre o Evento:</label>
                                        <textarea  name="sobre" class="form-control" style="height: 100px"  id="sobre" placeholder="Descrição...">{{$evento->sobre}}</textarea>
                                        {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback ">
                                        <label >Procedimento de inscrição:</label>
                                        <textarea  name="descIns" class="form-control" style="height: 100px"  id="descIns" placeholder="Descrição...">{{$evento->descIns}}</textarea>
                                        {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                                    </div>
                                    <hr>
                                    <h3 class="dark-grey">Endereço:</h3><br>

                                    <div class="form-group col-lg-5 has-feedback ">
                                        <label > CEP: </label>
                                        <input type="text" name="cep" class="form-control" value="{{$evento->cep}}"  id="cep">
                                        <span class="fa fa-thumb-tack form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-5 has-feedback">
                                        <label>Endereço:</label>
                                        <input type="text" name="endereco" value="{{$evento->endereco}}" class="form-control" id="end">
                                    </div>
                                    <div class="form-group col-lg-2 has-feedback">
                                        <label>Número:</label>
                                        <input type="text" name="numero" onkeyup="somenteNumeros(this);" value="{{$evento->numero}}" maxlength="5" class="form-control" id="numero">
                                    </div>

                                    <div class="form-group col-lg-5 has-feedback">
                                        <label>Cidade:</label>
                                        <input type="text" name="cidade" value="{{$evento->cidade}}" class="form-control" id="cidade">
                                    </div>

                                    <div class="form-group col-lg-5 ">
                                        <label>Bairro:</label>
                                        <input type="text" name="bairro" class="form-control" value="{{$evento->bairro}}" id="bairro">
                                    </div>

                                    <div class="form-group col-lg-2 has-feedback">
                                        <label>Estado:</label>
                                        <input type="text" name="estado" value="{{$evento->estado}}" class="form-control" id="estado">
                                    </div>

                                    <div class="form-group col-lg-8 ">
                                        <label class="col-md-3 control-label" for="img">Upload Imagem</label>
                                        <input id="img" name="img" class="input-file" type="file">
                                    </div>
                                </div>
                            </section>
                            <div>
                                <p class="text-center"><button type="submit" class="btn btn-success btn-success-custom "> Salva </button></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </br>

    <!-- Modal Atividades -->

    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Adicionar uma nova atividade: {{$evento->titulo}}</h4>
                </div>
                <form action="{{route('evento-atividade.store')}}" method="post">
                    {{ method_field('POST')}}
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <section class="hast">
                            <div class="col-md-12">
                                <h3 class="dark-grey">Informações Atividade</h3><br>

                                <input type="text" name="eventoId" style="display: none;" class="form-control" id="eventoId" value="{{$evento->id}}">

                                <div class="form-group col-lg-10 has-feedback">
                                    <label>Titulo:</label>
                                    <input type="text" name="titulo" class="form-control" id="titulo" value="" required="">
                                    <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                                </div>

                                <div class="form-group col-lg-5 has-feedback">
                                    <label>Cordenação:</label>
                                    <input type="text" name="cordenacao" class="form-control" id="cordenacao" value="" >
                                    {{--<span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>--}}
                                </div>

                                <div class="form-group col-lg-5 has-feedback">
                                    <label>Palestrante:</label>
                                    <input type="text" name="palestrante" class="form-control" id="palestrante" value="" >
                                    <span class="fa fa-user-circle-o form-control-feedback form-control-feedback-custom"></span>
                                </div>

                                <div class="form-group col-lg-5 has-feedback">
                                    <label>Área:</label>
                                    <select id="area" name="area" onclick="combobox()" class="form-control">
                                        <option value="">- Selecione -</option>
                                        <option value="CIÊNCIAS EXATAS E DA TERRA">CIÊNCIAS EXATAS E DA TERRA</option>
                                        <option value="CIÊNCIAS BIOLÓGICAS">CIÊNCIAS BIOLÓGICAS</option>
                                        <option value="ENGENHARIAS">ENGENHARIAS</option>
                                        <option value="CIÊNCIAS DA SAÚDE">CIÊNCIAS DA SAÚDE</option>
                                        <option value="CIÊNCIAS AGRÁRIAS">CIÊNCIAS AGRÁRIAS</option>
                                        <option value="CIÊNCIAS SOCIAIS APLICADAS">CIÊNCIAS SOCIAIS APLICADAS</option>
                                        <option value="CIÊNCIAS HUMANAS">CIÊNCIAS HUMANAS</option>
                                        <option value="LINGÜÍSTICA, LETRAS E ARTES">LINGÜÍSTICA, LETRAS E ARTES</option>
                                        <option value="OUTRAS">OUTRAS</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-5 has-feedback">
                                    <label>Modalidade:</label>
                                    <select id="modalidade" name="modalidade" onclick="combobox()" class="form-control">
                                        <option value="">- Selecione -</option>
                                        <option value="Palestra">PALESTRA</option>
                                        <option value="Minicurso">MINICURSO</option>
                                        <option value="Mesa Redonda">MESA REDONDA</option>
                                        <option value="Entreterimento">ENTRETERIMENTO</option>
                                        <option value="Outras">OUTRAS</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-5 has-feedback ">
                                    <label >Data:</label>
                                    <input type="date" name="data" class="form-control"   id="data" placeholder="dd/MM/dddd" required="">
                                    <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                                </div>

                                <div class="form-group col-lg-5 has-feedback ">
                                    <label >Horario:</label>
                                    <input type="text" name="horario" class="form-control"   id="horario" placeholder="HH:MM" required="">
                                    <span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>
                                </div>

                                <div class="form-group col-lg-5 has-feedback ">
                                    <label >Convidados:</label>
                                    <input type="text" name="convidados" class="form-control"   id="convidados" >
                                    {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                                </div>

                                <div class="form-group col-lg-5 has-feedback ">
                                    <label >Local de Realização:</label>
                                    <input type="text" name="local" class="form-control"   id="local" placeholder="Ex: Sala 01" required="">
                                    {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
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