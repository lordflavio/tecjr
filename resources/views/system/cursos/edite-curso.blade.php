@extends('layouts.tamplate-system')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="hast">
                <h1 style="margin-top: -50px;" class="text-center h1-curso"> Editar Curso: {{$curso->titulo}} </h1>
                <div style="padding-bottom: 20px">
                    <button data-toggle="modal" data-target="#ative" class=" {{($curso->inscricoes == true) ? 'btn-success' : 'btn-danger'}} col-md-offset-11 col-sm-offset-10 col-xs-offset-9">{{($curso->inscricoes == true) ? 'Ativo' : 'Não Ativo'}}</button>
                </div>

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#editar">Editar</a></li>
                    <li><a data-toggle="tab" href="#add_conteudo">Add Conteudo</a></li>
                    <li><a data-toggle="tab" href="#inscritos">Inscritos</a></li>
                    {{--<li><a data-toggle="tab" href="#menu2">Archivos de Registro</a></li>--}}
                </ul>

                <div class="tab-content">
                    <div id="editar" class="tab-pane fade in active even">
                        <form action="{{route('cursoex.update',$curso->id)}}" method="post" enctype="multipart/form-data">
                            {{ method_field('POST')}}
                            {{ csrf_field() }}
                            <img src="{{$curso->img}}" alt="CURSO" class="center-block img-responsive" width="300">
                            <section class="hast">
                                <div class="col-md-10">
                                    <h3 class="dark-grey">Informações</h3><br>

                                    <div class="form-group col-lg-6 has-feedback">
                                        <label>Titulo:</label>
                                        <input type="text" name="titulo" class="form-control" id="titulo" value="{{$curso->titulo}}">
                                        <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback">
                                        <label>Ministrante</label>
                                        <input type="text" name="ministrante" class="form-control" id="ministrante" value="{{$curso->ministrante}}">
                                        <span class="glyphicon glyphicon-user form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-4 has-feedback ">
                                        <label >Data Atual: {{date("d-m-Y", strtotime($curso->data))}} </label>
                                        <input type="date" name="data" class="form-control" id="data" placeholder="dd/MM/dddd">
                                        <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                                    </div>
                                    <div class="form-group col-lg-4 has-feedback ">
                                        <label >Valor de Inscricao:</label>
                                        <input type="text" name="valorInscricao" class="form-control"  value="{{$curso->valorInscricao}}"  id="valorInscricao">
                                        <span class="fa fa-money form-control-feedback form-control-feedback-custom"></span>
                                    </div>
                                    <div class="form-group col-lg-2 has-feedback ">
                                        <label >Horario:</label>
                                        <input type="text" name="horario" class="form-control" value="{{$curso->horario}}"   id="horario" placeholder="HH:MM">
                                        <span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-2 has-feedback ">
                                        <label >Duração:</label>
                                        <input type="text" name="duracao" class="form-control" value="{{$curso->duracao}}"   id="duracao" placeholder="HH">
                                        <span class="fa fa-clock-o form-control-feedback form-control-feedback-custom"></span>
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback ">
                                        <label>Pré-requisitos:</label>
                                        <textarea  name="preRequisitos" class="form-control" style="height: 100px"   id="preRequisitos" placeholder="Descrição...">{{$curso->preRequisitos}}</textarea>
                                        {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback ">
                                        <label>Publico Alvo:</label>
                                        <textarea  name="publicoAlvo" class="form-control" style="height: 100px"  id="publicoAlvo" placeholder="Descrição...">{{$curso->publicoAlvo}}</textarea>
                                        {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback ">
                                        <label >Objetivo:</label>
                                        <textarea  name="objetivo" class="form-control" style="height: 100px"  id="objetivo" placeholder="Descrição...">{{$curso->objetivo}}</textarea>
                                        {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                                    </div>

                                    <div class="form-group col-lg-6 has-feedback ">
                                        <label >Descrição:</label>
                                        <textarea  name="discricao" class="form-control" style="height: 100px"  id="discricao" placeholder="Descrição...">{{$curso->descricao}}</textarea>
                                        {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                                    </div>
                                    
                                     <div class="form-group col-lg-4 has-feedback">
                                            <label>Situação</label>
                                            <select id="sexo" name="situacao" class="form-control" required="">
                                                <option value="{{($curso->situacao == "") ? '- Selecione -' : $curso->situacao}}">{{($curso->situacao == "") ? '- Selecione -' : $curso->situacao}}</option>
                                                <option value="Em andamento">Em andamento</option>
                                                <option value="Finalizado">Finalizado</option>
                                            </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="img">Upload Imagem</label>
                                        <input id="img" name="img" class="input-file" type="file">
                                    </div>

                                </div>
                            </section>
                            <div class="col-md-12">
                                <p class="text-center"> <button type="submit" class="btn btn-success btn-success-custom "> Salvar  </button> <a href="/system/curso" type="button" class="btn btn-success btn-success-custom ">Voltar</a> </p>
                            </div>
                        </form>
                    </div>

                    <div id="add_conteudo" class="tab-pane fade">
                        <form class="form-horizontal" action="{{route('cursoctd.conteudo',$curso->id)}}" method="post" enctype="multipart/form-data" style="margin-top: 20px">
                        {{ method_field('POST')}}
                        {{ csrf_field() }}
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="conteudo">Add Conteudo</label>
                                <div class="col-md-5">
                                    <input id="conteudo" name="conteudo" type="text" placeholder="I - Introdução" class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group" style="margin-left: 3px">
                                <label class="control-label col-md-3" for="submit"></label>
                                <div class="col-md-6">
                                    <button id="submit" name="submit" class="btn btn-success btn-success-custom" style="width: 100px">Add</button>
                                </div>
                            </div>
                        </form>


                        <div class="container">
                            <div class="row">
                                <h1 class="text-left h1-curso">Conteudo</h1>
                                <hr>
                                @if(count($conteudo) > 0)
                                    <table class="table-responsive " border="1">
                                        @foreach($conteudo as $cont)
                                        <tr>
                                            <td style="padding: 5px"> <b>{{$cont->conteudo}}</b></td>
                                            <td style="padding: 5px"> <a href="{{'/system/conteudo/'.$cont->id.'/'.$curso->id}}" type="button" class="btn btn-danger">Excluir</a></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div id="inscritos" class="tab-pane fade">
                        <br>

                        <div class="col-md-6" style="margin-bottom: 20px">
                            <button data-toggle="modal" data-target="#add" class="btn btn-success btn-success-custom" > Add Participante</button>
                        </div><br>
                        @if(count($participantes) > 0)
                            <div class="table-bordered col-lg-12">
                                <table id="mytable" class="table">

                                    <thead>
                                    <th class="text-center">Img</th>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">CPF</th>
                                    <th class="text-center">Sexo</th>
                                    <th class="text-center">Celular</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Certificar Participante</th>
                                    {{--<th class="text-center">Remover </th>--}}

                                    </thead>
                                    <tbody>
                                    @for($i = 0; $i < count($participantes['part']); $i++)
                                        <tr>
                                            <td><img src="{{$participantes['part'][$i]->img}}" width="50" alt="Participante"></td>
                                            <td>{{$participantes['part'][$i]->nome}}</td>
                                            <td>{{$participantes['part'][$i]->cpf}}</td>
                                            <td>{{$participantes['part'][$i]->sexo}}</td>
                                            <td>{{$participantes['part'][$i]->celular}}</td>
                                            <td>{{$participantes['user'][$i]->email}}</td>

                                            <td>
                                                @if($participantes['crf'][$i]->certificado != 1)
                                                    <form action="/system/curso-certificar/{{$curso->id}}/{{$participantes['part'][$i]->id}}" method="post" class="col-md-offset-2">
                                                        {{ method_field('POST')}}
                                                        {{ csrf_field() }}
                                                        <div class="form-group  has-feedback">

                                                            <select id="crf" name="crf" class="form-control" required="">
                                                                <option value="0">Em espera</option>
                                                                <option value="1">Confirmado</option>
                                                                <option value="2">Negado</option>
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <p  data-placement="top" data-toggle="tooltip" title="Certificar"><button type="submit" class="btn btn-primary btn-xs" data-title="certificar">{{$participantes['crf'][$i]->certificado == 0 ? 'Certificar Paticipante' : 'Autorizar '. $participantes['crf'][$i]->getCertificado($participantes['crf'][$i]->certificado) }} </button></p>
                                                        </div>
                                                    </form>
                                                @else
                                                    <p class="text-center" data-placement="top" data-toggle="tooltip" title="{{$participantes['crf'][$i]->getCertificado($participantes['crf'][$i]->certificado)}}"><a type="button" class="btn {{$participantes['crf'][$i]->getLabel($participantes['crf'][$i]->certificado)}} btn-xs" data-title="certificar">{{$participantes['crf'][$i]->getCertificado($participantes['crf'][$i]->certificado)}}</a></p>
                                                @endif
                                            </td>
                                            {{--<td><a href="/system/curso-excluir-participante/{{$participantes['part'][$i]->id}}/{{$curso->id}}" data-placement="top" data-toggle="tooltip" title="Remover"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span style="margin-left: 4px" class="glyphicon glyphicon-trash"></span></button></a></td>--}}
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h4 class="text-center">Não há Inscristos no momento </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </br>

    {{-- Modal Ativar Curso --}}
    <div class="modal fade" id="ative" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> {{($curso->inscricoes == true) ? 'Desativar' : 'Ativar'}} {{$curso->titulo}} </h4>
                </div>
                <div class="panel-body">
                    <p> Você deseja {{($curso->inscricoes == true) ? 'desativar' : 'ativa'}} as inscrições para esse curso ? </p>
                    <div class="row">
                        <div class="col-12-xs text-center">
                            <a href="{{($curso->inscricoes == true) ? route('curso.desative',$curso->id) : route('curso.ative',$curso->id)}}"><button class="btn btn-success btn-md">Sim</button></a>
                            <button class="btn btn-danger btn-md " data-dismiss="modal">Não</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Ativar Curso --}}
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Adicinar Participantes ao Curso de  {{$curso->titulo}} </h4>
                </div>
                <div class="panel-body">
                    <p> Digite o CPF do Participante </p>
                    <div class="row">
                        <form action="{{route('curso-add',$curso->id)}}" method="post">
                            {{ method_field('POST')}}
                            {{ csrf_field() }}
                            <section>
                                <div class="col-md-10">
                                    <h3 class="dark-grey">Digite o CPF</h3><br>

                                    <div class="form-group col-lg-7 has-feedback ">
                                        <label >CPF:</label>
                                        <input type="text" name="cpf" id="cpf" class="form-control"  >
                                        {{--<span class="fa fa-link form-control-feedback form-control-feedback-custom"></span>--}}
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <p><button type="submit" class="btn btn-success btn-success-custom "> Buscar  </button></p>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection