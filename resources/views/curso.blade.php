@extends('layouts.tamplate-principal')

@section('content')
    <section id="info-curso">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 mx-auto">
            <div class="col-md-12 espacamento">
                <div class="col-md-3 col-sm-6">
                    <div class="bloco-center">
                        <i class="fa fa-building-o fa-5x" aria-hidden="true"></i>
                        <div class="espacamento-interno">
                            <p class="icons-descri">Curso Presencial</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="bloco-center">
                        <i class="fa fa-ticket fa-5x" aria-hidden="true"></i>
                        <div class="espacamento-interno">
                            <p class="icons-descri">Preços Acessiveis</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="bloco-center">
                        <i class="fa fa-clock-o fa-5x" aria-hidden="true"></i>
                        <p class="icons-descri">Carga Horaria: XX Horas</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="bloco-center">
                        <i class="fa fa-graduation-cap fa-5x" aria-hidden="true"></i>
                        <p class="icons-descri">Profissionais Qualificado</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="conteudo-cursos">
        <div class="container">

            <div class="row texto-espacamento">

                <h1>O QUE VOU APRENDER <span>NESSE CURSO!</span></h1>
                <p>Conteúdo completo para você aprender tudo sobre {{$curso[0]->titulo}}</p>

            </div>

            <div class="conteudo espacamento-conteudo">

                <div class="col-md-8">
                    <div class="tab">
                        <button class="tablinks" onclick="openDescri(event, 'Desc')" id="defaultOpen">Descrição</button>
                        <button class="tablinks" onclick="openDescri(event, 'Conteudo')">Conteudo</button>
                        <button class="tablinks" onclick="openDescri(event, 'Info')">Informações</button>
                    </div>

                    <div id="Desc" class="tabcontent">
                        <div class="descri-interna">
                            <i class="fa fa-id-card-o fa-5x" aria-hidden="true"></i>
                            <p class="desc-tab">Descrição de Curso</p>
                            <hr class="divisoria">
                            <div class="descri">
                                <p class="texto-descri"> {{$curso[0]->discricao}} </p>
                            </div>
                        </div>
                    </div>

                    <div id="Conteudo" class="tabcontent">
                        <div class="descri-interna">
                            <i class="fa fa-book fa-5x" aria-hidden="true"></i>
                            <p class="desc-tab">Conteudo Programatico</p>
                            <hr class="divisoria">
                            <div class="conteudos-prog">
                                <ul>
                                    @foreach($conteudo as $cont)
                                    <li class="text-left"> {{$cont->conteudo}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="Info" class="tabcontent">
                        <div class="descri-interna">
                            <i class="fa fa-info fa-5x" aria-hidden="true"></i>
                            <p class="desc-tab">Informações Sobre o Curso</p>
                            <hr class="divisoria">
                            <div class="descri">

                                <p class="desc"><span class="ini">Carga Horária do Certificado:</span> {{$curso[0]->duracao}} horas</p>

                                <p class="desc"><span class="ini">Público Alvo:</span> {{$curso[0]->publicoAlvo}} </p>

                                <p class="desc"><span class="ini">Pré-requisitos:</span> {{$curso[0]->preRequisitos}} </p>

                                <p class="desc"><span class="ini">Objetivo:</span> {{$curso[0]->objetico}}</p>

                                <p class="desc"><span class="ini">Certificado:</span> O Certificado de Conclusão do Curso é válido em todo o Brasil.</p>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="bloco-inscri">
                        <button type="button" {{($curso[0]->inscricoes == true) ? '' : 'disabled'}}  class="btn btn-success"><p>MATRICULAR NESSE CURSO</p><small>{{($curso[0]->inscricoes == true) ? 'COMECE A ESTUDAR AGORA' : 'ISCRIÇÕES NÃO DISPONIVEIS NO MOMENTO'}} </small></button>
                        <div class="dentro-inscri">
                            <p><i class="fa fa-ticket" aria-hidden="true"></i><span> {{$curso[0]->valorInscricao}} </span></p>
                            <p><i class="fa fa-file-text-o" aria-hidden="true"></i><span> C/ Certificado</span></p>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>


    <address id="contato-insc">
        <div class="container">
            <div class="row espacamento">
                <h1>Ficou com alguma dúvida? <br>Entre em contato conosco!</h1>
            </div>
            <div style="margin-bottom: 45px;">
                <a class="text-center" href="/contato" id="js-trigger-overlay" type="button">Contato</a>
            </div>
        </div>
    </address>

@endsection