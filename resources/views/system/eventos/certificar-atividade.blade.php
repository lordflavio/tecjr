@extends('layouts.tamplate-system')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="hast">
                <h1 style="margin-top: -50px;" class="text-center h1-curso"> Certificar Participante: {{$p->nome}} </h1><br>

                <h4 class="text-center">Atividades</h4>
                <div class="table-bordered col-lg-12">
                    <table id="mytable" class="table">

                        <thead>
                        <th class="text-center">Titulo</th>
                        <th class="text-center">Área</th>
                        <th class="text-center">Horario</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Certificar</th>
                        </thead>
                        <tbody>
                        @if(count($atvP) > 0)
                        @for($i = 0; $i < count($atvP['atv']); $i++)
                            <tr>
                                <td class="text-center">{{$atvP['atv'][$i]->titulo}}</td>
                                <td class="text-center">{{$atvP['atv'][$i]->area}}</td>
                                <td class="text-center">{{$atvP['atv'][$i]->horario}}</td>
                                <td class="text-center">{{date("d/m/Y", strtotime($atvP['atv'][$i]->data))}}</td>
                                <td>
                                    @if($atvP['atvp'][$i]->certificado != 1)
                                        <form action="/system/evento-certificar/{{$p->id}}}/{{$atvP['atv'][$i]->id}}" method="post" class="col-md-offset-2">
                                            {{ method_field('POST')}}
                                            {{ csrf_field() }}
                                            <div class="form-group col-lg-10 has-feedback">

                                                <select id="crf" name="crf" class="form-control" required="">
                                                    <option value="0">Em espera</option>
                                                    <option value="1">Confirmado</option>
                                                    <option value="2">Negado</option>
                                                </select>
                                            </div>
                                            <div>
                                                <p style="margin-left: 20px" data-placement="top" data-toggle="tooltip"><button type="submit" class="btn btn-primary btn-xs" data-title="certificar">{{$atvP['atvp'][$i]->certificado == 0 ? 'Certificar Participante' : 'Autorizar '. $atvP['atvp'][$i]->getCertificado($atvP['atvp'][$i]->certificado)}}</button></p>
                                            </div>
                                        </form>
                                    @else
                                        <p class="text-center" data-placement="top" data-toggle="tooltip" title="{{$atvP['atvp'][$i]->getCertificado($atvP['atvp'][$i]->certificado)}}"><a type="button" class="btn {{$atvP['atvp'][$i]->getLabel($atvP['atvp'][$i]->certificado)}} btn-xs" data-title="certificar">{{$atvP['atvp'][$i]->getCertificado($atvP['atvp'][$i]->certificado)}}</a></p>
                                    @endif
                                </td>
                            </tr>
                        @endfor
                        @else
                            <h5 class="text-center"> Este Participante não se inscreveu em nenhuma atividade </h5>
                        @endif
                        </tbody>
                    </table>
                </div>
                <a href="{{route('evento.show',$evento->id)}}" class="text-left" style="margin-right: 10px;"><button type="button" data-toggle="modal" data-target="#contact"  class="btn btn-success btn-success-custom "> Voltar </button></a>
                <p></p>
            </div>
        </div>
    </div>
@endsection