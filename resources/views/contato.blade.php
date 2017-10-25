@extends('layouts.tamplate-principal')

@section('content')
    <section id="contato">
        <div class="container animated fadeIn">
            <div class="contato-title">
                <h1> Contato </h1>
            </div>
            <hr>

            <div class="row">

                <div class="col-sm-12 col-md-12" id="parent">
                    <div class="col-md-6 col-sm-6 intrinsic-container intrinsic-container-16x9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3941.954206041181!2d-36.498557685765874!3d-8.883849893550412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7070cc21055ecdd%3A0xb208d979910ba4dc!2sGaranhuns+Campus%7CUPE+-+Garanhuns+Campus!5e0!3m2!1spt-BR!2sbr!4v1507601712573" width="400" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <form action="{{route('up.envio')}}" class="contact-form" method="post">
                            {{ method_field('POST')}}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" class="form-control" id="nome" name="name_n" placeholder="Nome" required="" autofocus="">
                            </div>


                            <div class="form-group form_left">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto" required="" autofocus="">                        </div>
                            <div class="form-group">
                                <textarea class="form-control textarea-contact"  rows="5" id="comment" name="mensage" placeholder="Escreva sua mensagem, responderemos em breve..." required=""></textarea>
                                <br>
                            </div>
                            <button type="submit" class=" btn btn-custom btn-send"> <span class="glyphicon glyphicon-send"></span> Enviar </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container second-portion">
                <div class="row">
                    <!-- Boxes de Acoes -->
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="box">
                            <div class="icon">
                                <div class="image"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                <div class="info">
                                    <h3 class="title">EMAIL & SITE</h3>
                                    <p>
                                        <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp empresa.tecjr@gmail.com
                                        <br>
                                        <br>
                                        <i class="fa fa-globe" aria-hidden="true"></i> &nbsp www.tecjr.com.br
                                    </p>

                                </div>
                            </div>
                            <div class="space"></div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="box">
                            <div class="icon">
                                <div class="image"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                <div class="info">
                                    <h3 class="title">CONTATO</h3>
                                    <p>
                                        <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp (+55)87 8122-7402
                                        <br>
                                    </p>
                                </div>
                            </div>
                            <div class="space"></div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="box">
                            <div class="icon">
                                <div class="image"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <div class="info">
                                    <h3 class="title">ENDEREÇO</h3>
                                    <p>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp R. Cap. Pedro Rodrigues, 105 - São José, Garanhuns - PE, 55295-110
                                    </p>
                                </div>
                            </div>
                            <div class="space"></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section>

@endsection