@extends('layouts.tamplate-system')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="hast">
                <h1 style="margin-top: -50px;" class="text-center h1-curso"> Certificar Participante </h1>

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
                        @for($i = 0; $i < count($atvP); $i++)
                            <tr>
                                <td>{{$atvP[$i]->titulo}}</td>
                                <td>{{$atvP[$i]->area}}</td>
                                <td>{{$atvP[$i]->horario}}</td>
                                <td>{{$atvP[$i]->email}}</td>
                                <td class="text-center"><a href="" data-placement="top" data-toggle="tooltip" title="Certificar"><button class="btn btn-info btn-xs" data-title="Certificar" data-toggle="modal" data-target="#delete" >Certificar</button></a></td>
                                <td class="text-center"><a href="#" data-placement="top" data-toggle="tooltip" title="Remover"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span style="margin-left: 4px" class="glyphicon glyphicon-trash"></span></button></a></td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
             </div>

        </div>
    </div>
@endsection