@extends('layouts.tamplate-system')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="hast">
                <h1 style="margin-top: -50px;" class="text-center h1-curso"> Atividade do Evento: {{$evento->nome}} </h1>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#atividades">Atividades</a></li>
                    <li><a data-toggle="tab" href="#inscricao">Inscrição</a></li>
                    <li><a data-toggle="tab" href="#inscritos">Inscritos</a></li>
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
                                            <p class="text-left"><b>Modalidade: </b>{{$atividade->categoria}}</p>
                                            <p class="text-left"><b>Data: </b>{{ date("d-m-Y", strtotime($atividade->data)) }} <b style="margin-left: 20px"> Horario: </b>{{$atividade->horario}}</p>
                                            <p class="text-left"><b>Resumo: </b>{{$atividade->resumo}}</p>
                                            <div>
                                                <a href="{{'/system/evento-atividade/'.$atividade->id.'/'. $evento->id}}" title="Remover">
                                                    <i class="fa fa-bitbucket "></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="inscricao" class="tab-pane fade">
                        <div class="col-md-12"><br>
                            <div class = "alert {{$evento->status == "false"?'alert-danger':'alert-success'}}  pull-right"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <b>{{$evento->status == "false"?'Não Ativo':'Ativo'}}</b> </div>
                            <div class="text-left">
                                <h3 class="dark-grey">Datas de Inscrições </h3><br>
                                <label >Data Atual: {{date("d-m-Y", strtotime($evento->dateInicioIns))}}</label></br>
                                <label >Data Atual: {{date("d-m-Y", strtotime($evento->dateFimIns))}}</label></br>
                            </div>
                            <div>
                                <button type="button" style="margin-left: 0" data-toggle="modal" data-target="#ativa"  class="btn btn-success btn-success-custom  "><i class="fa fa-archive"></i> Atualizar Data </button>
                                <a type="button" href="{{route('eventoat.ativa',$evento->id)}}" style="margin-left: 3px" class="btn btn-success  btn-success-custom  "><i class="fa fa-check"></i> Ativar Inscrições </a>
                            </div>
                        </div>
                    </div>
                    <div id="inscritos" class="tab-pane fade">
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
                    <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Adicionar uma nova atividade: {{$evento->nome}}</h4>
                </div>
                <form action="{{route('evento-atividade.store')}}" method="post">
                    {{ method_field('POST')}}
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <section class="hast">
                            <div class="col-md-10">
                                <h3 class="dark-grey">Informações Atividade</h3><br>

                                <input type="text" name="eventoId" style="display: none;" class="form-control" id="eventoId" value="{{$evento->id}}">

                                <div class="form-group col-lg-11 has-feedback">
                                    <label>Titulo:</label>
                                    <input type="text" name="titulo" class="form-control" id="titulo" value="" required="">
                                    <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                                </div>

                                <div class="form-group col-lg-6 has-feedback">
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
                                    <label>Categoria:</label>
                                    <select id="categoria" name="categoria" onclick="combobox()" class="form-control">
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

                                <div class="form-group col-lg-11 has-feedback ">
                                    <label >Resumo:</label>
                                    <textarea  name="resumo" class="form-control" style="height: 150px"  id="resumo" placeholder="Resumo..."></textarea>
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

    <!-- Modal Ativar Inscrições -->

    <div class="modal fade" id="ativa" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Datas de Inicio de Incrições </h4>
                </div>
                <form action="{{route('eventoat.ativa',$evento->id)}}" method="post">
                    {{ method_field('POST')}}
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <section class="hast">
                            <div class="col-md-10">
                                <h3 class="dark-grey">Novas Datas </h3><br>

                                <input type="text" name="novaData" style="display: none;" class="form-control" id="eventoId" value="new">

                                <div class="form-group col-lg-5 has-feedback ">
                                    <label >Data Inicio:</label>
                                    <input type="date" name="dateInicioIns" class="form-control"   id="dateInicioIns" placeholder="dd/MM/dddd">
                                    <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                                </div>
                                <div class="form-group col-lg-5 has-feedback ">
                                    <label >Data Fim:</label>
                                    <input type="date" name="dateFimIns" class="form-control"   id="dateFimIns" placeholder="dd/MM/dddd">
                                    <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="panel-footer" style="margin-bottom:-14px;">
                        <input type="submit" class="btn btn-success" value="Ativar Inscrições"/>
                        <!--<span class="glyphicon glyphicon-remove"></span>-->
                        <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection