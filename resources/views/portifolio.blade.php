@extends('layouts.tamplate-principal')

@section('content')
    <section id="portfolio">
        <div class="container">

            <div class="row texto">

                <h1 class="texto-titulo"> Nossos Serviços </h1>
                <hr class="port-linha">
                <!--- <h2 class="texto-subtitulo">Veja alguns dos nossos serviços, entre em contato conosco.</h2> -->
                <!---
                <div class="sobre">
                    <p>[REFAZER]Desde sua fundação, a TEC Jr. oferece os mais diversos cursos de tecnologia para escolas e empresas públicas e privadas, oferecendo conteúdos diferenciados e profissionais capacitados e vinculados a Universidade de Pernambuco, além de oferecer certificados validos nacionalmente, validos inclusive como carga horária de extensão para cursos superiores do estado de Pernambuco. </p>
                    <p>A TEC Jr. já desenvolveu e ministrou cursos junto a prefeitura municipal de Garanhuns,  Universidade de Pernambuco, entre outras instituições da nossa Região. Entre os cursos oferecidos pela TEC Jr. estão:</p>
                </div>
                 -->
            </div>

            <div class="row port-espacamento center-block">
                <div class="col-lg-2"></div>
                <div class="col-lg-10 mx-auto">

                    <div class="col-md-12">
                        <div class="col-md-3 col-sm-6 col-custom center-block">
                            <div class="bloco-inferior">

                            <span class="fa-stack fa-4x">
                                <i><img src="imagens/icons_port/Desen_WEB.png" alt="WEB"></i>
                            </span>
                                <h4>DESENVOLVIMENTO WEB</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-custom center-block">
                            <div class="bloco-inferior">

                            <span class="fa-stack fa-4x">
                                <i><img src="imagens/icons_port/Desen_SOFT.png" alt="SOFT"></i>
                            </span>
                                <h4>DESENVOLVIMENTO DE SOFTWARE</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-custom center-block">
                            <div class="bloco-inferior">

                            <span class="fa-stack fa-4x">
                                <i><img src="imagens/icons_port/Consultoria.png" alt=""></i>
                            </span>
                                <h4 class="h4-custom">CONSULTORIA</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-3 col-sm-6 col-custom center-block">
                            <div class="bloco-inferior">

                            <span class="fa-stack fa-4x">
                                <i><img src="imagens/icons_port/R_Eventos.png" alt="EVENTOS"></i>
                            </span>
                                <h4>REALIZAÇÃO DE EVENTOS</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-custom center-block">
                            <div class="bloco-inferior">

                            <span class="fa-stack fa-4x">
                                <i><img src="imagens/icons_port/R_CURSOS.png" alt="CURSOS"></i>
                            </span>
                                <h4>REALIZAÇÃO DE CURSOS</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-custom center-block">
                            <div class="bloco-inferior">

                            <span class="fa-stack fa-4x">
                                <i><img src="imagens/icons_port/Recrutamento.png" alt="RECRUTAMENTO"></i>
                            </span>
                                <h4 class="h4-custom">RECRUTAMENTO</h4>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </section>

    {{--<section id="portfolio-realizados">--}}
        {{--<div class="container">--}}

            {{--<div class="row texto">--}}
                {{--<h1>Eventos realizados</h1>--}}
                {{--<h2>Alguns eventos realizados</h2>--}}
            {{--</div>--}}

            {{--<div id="" class="espacamento">--}}

                {{--<!--- EVENTOS REALIZADOS - BLOCO DE IMAGENS E TEXTO -->--}}
                {{--<div class="thumbnail  bordas col-lg-4">--}}
                    {{--<a href="#" target="_blank">--}}
                        {{--<img src="imagens/combinatividade.png"  alt="COMBINATIVIDADE">--}}
                        {{--<div class="nome-evento"><p>COMBINATIVIDADE 2016</p></div><hr>--}}
                        {{--<div class="local-evento">--}}
                            {{--<p class="glyphicon glyphicon-map-marker up-line"><span> UPE - Campus Garanhuns</span></p><br>--}}
                            {{--<p class="glyphicon glyphicon-calendar line"><span> 20 e 21 de Outubro</span></p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="thumbnail center-block bordas col-lg-4">--}}
                    {{--<a href="#" target="_blank">--}}
                        {{--<img src="imagens/curso.jpg" alt="CURSOS">--}}
                        {{--<div class="nome-evento"><p>REALIZAÇÃO DE CURSOS (UPE)</p></div><hr>--}}
                        {{--<div class="local-evento">--}}
                            {{--<p class="glyphicon glyphicon-map-marker up-line"><span> UPE - Campus Garanhuns</span></p><br>--}}
                            {{--<p class="glyphicon glyphicon-calendar line"><span> 20 e 21 de Outubro</span></p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="thumbnail center-block bordas col-lg-4">--}}
                    {{--<a href="#" target="_blank">--}}
                        {{--<img src="imagens/Latdic.png" alt="LATIDIC">--}}
                        {{--<div class="nome-evento"><p>LATDIC (UPE)</p></div><hr>--}}
                        {{--<div class="local-evento">--}}
                            {{--<p class="glyphicon glyphicon-map-marker up-line"><span> UPE - Campus Garanhuns</span></p><br>--}}
                            {{--<p class="glyphicon glyphicon-calendar line"><span> 20 e 21 de Outubro</span></p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="btn-port">--}}
                {{--<button  type="button" id="b-port-left"><i class="glyphicon glyphicon-circle-arrow-left "></i></button>--}}
                {{--<button  type="button" id="b-port-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></button>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</section>--}}

    <section id="empresa-junior">
        <div class="container">
            <div class="row texto">
                <h1>- Movimento Empresa Júnior -</h1>
                <h2>Conheça um pouco sobre esse movimento</h2>
            </div>

            <div class="sobre">
                <p>Criada por alunos de Graduação e orientada pelos professores, a Empresa Junior é uma associação civil, sem fins lucrativos, que promove a prestação de projetos e serviços, a outras empresas e a sociedade em geral. Seu foco maior é promover a experiência profissional do estudante, fazendo com que ele aprimore ainda mais a formação profissional.</p>
                <p>Oferecendo uma consultoria de baixo custo de mercado, as Empresas Júnior (EJ), geram de forma única a prática do aprendizado em sala de aula, além de promover no universitário o trabalho em equipe, a criatividade e a busca pela excelência.</p>
                <p>A Brasil Junior (BJ) é a Confederação Brasileira de Empresas Juniores e compartilha com todos os empresários juniores o objetivo de tornar o MEJ um movimento reconhecido pelos diversos atores da sociedade, por contribuir para o desenvolvimento do país por meio da formação de profissionais diferenciados.</p>
                <p>No estado de Pernambuco a entidade responsável pelo desenvolvimento, regulamentação e divulgação das empresas juniores do estado e a FEJEPE - Federação de Empresas Juniores do estado de Pernambuco, onde tem por objetivo atuar juntamente a órgãos públicos e privados, autoridades governamentais e a sociedade em geral, a fim fomentar cada vez mais o movimento Pernambucano.</p>
            </div>

            <div class="info">
                <h2>Para mais informações acesse: </h2>
                <hr>
                <p class="pull-right">
                    <a href="https://www.google.com.br/search?q=http://www.brasiljunior.org.br/" target="_blank">
                        <img id="imagem1" src="https://sites.google.com/site/imagensdositedatecjr/home/brasil_junior.png" alt="Brasil Junior" width="200px" height="110px"/></a>

                    <a href="https://www.fejepe.org.br/" target="_blank">
                        <img src="https://sites.google.com/site/imagensdositedatecjr/home/fejepe.png" alt="Fejepe" width="200px" height="90px" /></a>
                </p>
            </div>

        </div>
    </section>

@endsection