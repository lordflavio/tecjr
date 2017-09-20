@extends('layouts.tamplate-system')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{route('evento-atividade.store')}}" method="post">
                {{ method_field('PATCH')}}
                {{ csrf_field() }}
                <h1 class="text-center h1-curso"> Novo Atividade Evento: {{$even->id}} </h1>
                <hr>
                <section class="hast">
                    <div class="col-md-10">
                        <h3 class="dark-grey">Informações Atividade</h3><br>

                        <div class="form-group col-lg-6 has-feedback">
                            <label>Titulo:</label>
                            <input type="text" name="nome" class="form-control" id="nome" value="">
                            <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-6 has-feedback">
                            <label>Titulo:</label>
                            <input type="text" name="nome" class="form-control" id="nome" value="">
                            <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
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



                        <div class="form-group col-lg-4 has-feedback ">
                            <label >Data:</label>
                            <input type="date" name="date" class="form-control"   id="date" placeholder="dd/MM/dddd">
                            <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-4 has-feedback ">
                            <label >Horario:</label>
                            <input type="text" name="horario" class="form-control"   id="horario" placeholder="HH:MM">
                            <span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-11 has-feedback ">
                            <label >Resumo:</label>
                            <textarea type="" name="resumo" class="form-control" style="height: 150px"  id="resumo" placeholder="Resumo..."></textarea>
                            {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                        </div>


                    </div>
                </section>
                <div>
                    <button type="submit" class="btn btn-success btn-success-custom "><i class="fa fa-plus-square-o pull-right"></i> Criar Atividade  </button>
                </div>
            </form>
        </div>
    </div></br>

@endsection