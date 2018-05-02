@extends('layouts.tamplate-system')

@section('content')
    <div class="container-fluid" style="margin-left: 15px">
        <div class="row">

            <h1 class="text-center"> Transações Financeiras </h1><br>



            <form action="{{route('home.transacoes2')}}" method="POST" enctype="multipart/form-data">
                {{ method_field('POST')}}
                {{ csrf_field() }}
                <div class="form-group col-lg-3 has-feedback">
                    <label>Exibir Transações dos últimos</label>
                    <select id="dias" name="dias" class="form-control">
                        <option value="{{$dias}}"> Últimos {{$dias}} Dias </option>
                        @if($dias != 7) <option value="7"> Últimos 7 Dias </option>@endif

                        @if($dias != 30) <option value="30"> Últimos 30 Dias </option> @endif

                        @if($dias != 60) <option value="60"> Últimos 60 Dias </option> </option> @endif

                        @if($dias != 120) <option value="120"> Últimos 120 Dias </option> @endif
                    </select>
                </div>

                @if(count($tr))

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">CPf</th>
                        <th class="text-center">Curso/Evento</th>
                        <th class="text-center">Codigo</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Valor</th>
                        {{--<th class="text-center">Metodo de Pagamento</th>--}}
                        <th class="text-center">Data</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0; $i < count($tr['tr']); $i++)
                    <tr>
                        <td class="text-center">{{$tr['part'][$i]->nome}}</td>
                        <td class="text-center">{{$tr['part'][$i]->cpf}}</td>
                        <td class="text-center">{{$tr['cev'][$i]->titulo}}</td>
                        <td class="text-center">{{$tr['tr'][$i]->code}}</td>
                        <td class="text-center">{{$tr['tr'][$i]->getStatus($tr['tr'][$i]->status)}}</td>
                        <td class="text-center">R$ {{number_format($tr['cev'][$i]->getValue($tr['cev'][$i],$tr['tr'][$i]->payment_method),2)}}</td>
                        <td class="text-center">{{ date("d/m/Y", strtotime($tr['tr'][$i]->date))}}</td>

                    </tr>
                    @endfor
                    </tbody>
                </table>
                <div class="form-group col-lg-11 ">
                    <button type="submit" class="btn btn-success center-block"> Buscar  </button>
                </div>
                @else
                    <div class="form-group col-lg-12">
                        <h3  class="text-center"> Não há Transações  </h3><br>
                    </div>
                @endif
            </form>
            <div class="col-lg-12">
                <a href="#" type="button" data-toggle="modal" data-target="#tra" class="btn btn-success btn-success-custom">Gerar Relatotio de Finanças</a> <p></p>
            </div>
        </div>
    </div>


    {{-- Modal Ativar Curso --}}
    <div class="modal fade" id="tra" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Gerar Faturamento  </h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="{{route('home.transacoes-periodo')}}" method="post">
                            {{ method_field('POST')}}
                            {{ csrf_field() }}
                            <section>
                                <div class="col-md-10">
                                    <h3 class="dark-grey">Especifique o os dias </h3><br>

                                    <div class="form-group col-lg-8 has-feedback">
                                        <select id="dias" name="dias" class="form-control">
                                            <option value="{{$dias}}"> Últimos {{$dias}} Dias </option>
                                            @if($dias != 7) <option value="7"> Últimos 7 Dias </option>@endif

                                            @if($dias != 30) <option value="30"> Últimos 30 Dias </option> @endif

                                            @if($dias != 60) <option value="60"> Últimos 60 Dias </option> </option> @endif

                                            @if($dias != 120) <option value="120"> Últimos 120 Dias </option> @endif
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <p><button type="submit" class="btn btn-success btn-success-custom "> Solicitar  </button></p>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection