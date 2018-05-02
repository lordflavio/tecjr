

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista Participantes</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo-lista.css" />
</head>
<body>

<div class="container-fluid">
    <header>
        <div id="logo" class="col-md-1">
            <img src="./imagens/logo1.png" width="200" style="float: left" alt="Logo Tec">
        </div>
        <div id="descricao" class="col-md-12">
            <p><b>TECNOLOGIA, EDUCAÇÃO E CONSULTORIA JÚNIOR</b></p>
            <p>Av. Capitão Pedro Rodrigues, nº 105 UPE – Garanhuns – PE</p>
            <p>www.tecjr.com.br - empresa.tecjr@gmail.com</p>
            <p>Telefone: (87) 9.8122-7402</p>
            <p>CNPJ: 17.281.120/0001-07</p>
        </div>
    </header>

    {{--<div class=" linha-header"></div>--}}

    <section id="corpo">
        <div class="espacamento">
            <h4><b> Evento: {{$e->titulo}}</b></h4>
            <h5><b> Atividade: {{$a->titulo}}</b></h5>
            <h5><b>Ministrante: </b><span>{{$a->palestrante}}</span></h5>
        </div>

        <div class="espacamento-tabela">
            <div class="row">
                <div class="span5">
                    <table class="table table-striped table-condensed" style="text-align: center">
                        <thead>
                        <tr>
                            <th>NOME</th>
                            <th>CPF</th>
                            <th>ASSINATURA</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($pa) > 0)
                            @foreach($pa as $p)
                                <tr>
                                    <td> {{$p->nome}} </td>
                                    <td> {{$p->cpf}}  </td>
                                    <td>              </td>
                                </tr>
                            @endforeach
                        @endif
                        <tr style="background-color: #005E89; margin-top: 20px">
                            <td style="color: #fff">Tec Jr - Garanhuns – PE</td>
                            <td></td>
                            <td style="color: #fff">{{$a->getDiaSemana()}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

    {{--<div class="container-fluid">--}}
        {{--<div class="espacamento-tabela">--}}

            {{--<div class="row">--}}
                {{--<div class="span5">--}}
                    {{--<table class="table table-striped table-condensed" style="text-align: center">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>NOME</th>--}}
                            {{--<th>CPF</th>--}}
                            {{--<th>ASSINATURA</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--<tr>--}}
                            {{--<td>Donna R. Folse</td>--}}
                            {{--<td>212.121.121-45</td>--}}
                            {{--<td>              </td>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>Emily F. Burns</td>--}}
                            {{--<td>212.121.121-45</td>--}}
                            {{--<td>              </td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>Andrew A. Stout</td>--}}
                            {{--<td>212.121.121-45</td>--}}
                            {{--<td>              </td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>Mary M. Bryan</td>--}}
                            {{--<td>212.121.121-45</td>--}}
                            {{--<td>              </td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>Mary A. Lewis</td>--}}
                            {{--<td>212.121.121-45</td>--}}
                            {{--<td>              </td>--}}
                        {{--</tr>--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

{{--</section>--}}




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>
