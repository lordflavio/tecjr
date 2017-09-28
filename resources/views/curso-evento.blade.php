@extends('layouts.tamplate-principal')
@section('content')
    <section id="p-cursos">
        <div class="container">

            {{--<div class="row texto">--}}
                {{--<h1> Cursos Ofertados </h1>--}}
                {{--<h2> Caso não encontre algum curso disponivel entre em contato conosco. </h2>--}}
            {{--</div>--}}

            {{--<div id="bloco-cursos" class="espacamento-curso">--}}
                {{--<div class="col-lg-12">--}}

                    {{--<div class="col-md-4 col-sm-12 col-custom center-block">--}}
                        {{--<a href="#">--}}
                            {{--<div class="cursos-conteudo">--}}
                                {{--<img class="img-responsive" src="img/logo.png" alt="img" height="160px" width="341px">--}}
                                {{--<br>--}}
                                {{--<p class="titulo-curso">DESENVOLVIMENTO WEB - MODULO I</p>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt eum expedita, hic inventore odit quis voluptas. Aliquam assumenda cum eveniet illo, in molestias non omnis optio quos reiciendis sint.</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-4 col-sm-12 col-custom center-block">--}}
                        {{--<a href="#">--}}
                            {{--<div class="cursos-conteudo">--}}
                                {{--<img class="img-responsive" src="img/logo.png" alt="img" height="160px" width="341px">--}}
                                {{--<br>--}}
                                {{--<p class="titulo-curso">LÓGICA DE PROGRAMAÇÃO</p>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt eum expedita, hic inventore odit quis voluptas. Aliquam assumenda cum eveniet illo, in molestias non omnis optio quos reiciendis sint.</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-sm-12 col-custom center-block">--}}
                        {{--<a href="#">--}}
                            {{--<div class="cursos-conteudo">--}}
                                {{--<img class="img-responsive" src="img/logo.png" alt="img" height="160px" width="341px">--}}
                                {{--<p class="titulo-curso">sdasdasdasdasdasd</p>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt eum expedita, hic inventore odit quis voluptas. Aliquam assumenda cum eveniet illo, in molestias non omnis optio quos reiciendis sint.</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-sm-12 col-custom center-block">--}}
                        {{--<a href="#">--}}
                            {{--<div class="cursos-conteudo">--}}
                                {{--<img class="img-responsive" src="img/logo.png" alt="img" height="160px" width="341px">--}}
                                {{--<p class="titulo-curso">sdasdasdasdasdasd</p>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt eum expedita, hic inventore odit quis voluptas. Aliquam assumenda cum eveniet illo, in molestias non omnis optio quos reiciendis sint.</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-sm-12 col-custom center-block">--}}
                        {{--<a href="#">--}}
                            {{--<div class="cursos-conteudo">--}}
                                {{--<img class="img-responsive" src="img/logo.png" alt="img" height="160px" width="341px">--}}
                                {{--<p class="titulo-curso">sdasdasdasdasdasd</p>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt eum expedita, hic inventore odit quis voluptas. Aliquam assumenda cum eveniet illo, in molestias non omnis optio quos reiciendis sint.</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-sm-12 col-custom center-block">--}}
                        {{--<a href="#">--}}
                            {{--<div class="cursos-conteudo">--}}
                                {{--<img class="img-responsive" src="img/logo.png" alt="img" height="160px" width="341px">--}}
                                {{--<p class="titulo-curso">sdasdasdasdasdasd</p>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt eum expedita, hic inventore odit quis voluptas. Aliquam assumenda cum eveniet illo, in molestias non omnis optio quos reiciendis sint.</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-sm-12 col-custom center-block">--}}
                        {{--<a href="#">--}}
                            {{--<div class="cursos-conteudo">--}}
                                {{--<img class="img-responsive" src="img/logo.png" alt="img" height="160px" width="341px">--}}
                                {{--<p class="titulo-curso">sdasdasdasdasdasd</p>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt eum expedita, hic inventore odit quis voluptas. Aliquam assumenda cum eveniet illo, in molestias non omnis optio quos reiciendis sint.</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}



            <div class="row espacamento">
                @for($i = 0; $i < 10; $i++)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img class="img-responsive" src="imagens/contato.png" alt="..." height="200px" width="320px">
                        <h4>DESENVOLVIMENTO WEB <br> MÓDULO I</h4>
                        <span class="descricao-curso">Amet assumenda ea eaque eius iusto minus pariatur. Aut consectetur consequatur cumque esse eum exercitationem facere id nisi ratione reiciendis. Mollitia, ut.</span>
                        <div class="descricao-avancada">
                            <p><i class="fa fa-clock-o fa-lg" aria-hidden="true"> -- Horas</i></p>
                            <p><i class="fa fa-ticket fa-lg" aria-hidden="true"> --,-- Reais</i></p>
                        </div>
                        <br>
                        <a href="#" class="btn btn-primary col-xs-12" role="button">View Snippet</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>


    <section id="p-cursos-outros">
        <div class="container">
            <div class="row espacamento">
                <h1>Não encontrou o curso que deseja? <br>Entre em contato conosco!</h1>
            </div>
            <div>
                <button id="js-trigger-overlay" type="button">Contato</button>
            </div>
        </div>
    </section>
@endsection