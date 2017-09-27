@extends('layouts.tamplate-principal')

@section('content')
    <section id="contato">

        <div class="container">

            <div class="row texto">
                <div class="col-md-3">
                    <img src="imagens/contato.png" alt="image_contato" class="hidden-sm">
                </div>
                <div class="col-md-9">
                    <h1>FALE CONOSCO</h1>
                    <h3><hr>Para perguntas sobre produtos, suporte técnico e outras dúvidas, você pode entrar em contato com a Kaspersky Lab por qualquer uma das seguintes maneiras.</h3>
                </div>
            </div>

            <article>
                <h1>Contato</h1>
                <hr>

                <div class="row">
                    <div class="col-sm-1"></div>

                    <div class="form-style-5">

                        <div class="col-md-8 col-md-offset-1">
                            <form>
                                <fieldset>
                                    <legend><span class="number">1</span> Contato: </legend>
                                {{--<div class="form-group col-sm-12 ">--}}
                                {{--<input type="text" name="nome" class="form-control" id="nome" placeholder="Nome: *">--}}
                                {{--</div>--}}
                                {{--<input type="email" name="field2" class="" placeholder="Email: *">--}}
                                {{--<label for="job">Assunto:</label>--}}
                                {{--<select id="job" name="field4">--}}
                                {{--<optgroup label="Indoors">--}}
                                {{--<option value="evento"> - Eventos</option>--}}
                                {{--<option value="cursos"> - Cursos</option>--}}
                                {{--<option value="web"> - Desenvolvimento WEB</option>--}}
                                {{--<option value="sistemas"> - Desenvolvimento de Softwares</option>--}}
                                {{--<option value="recrutamento"> - Recrutamento</option>--}}
                                {{--<option value="consultoria"> - Consultoria</option>--}}
                                {{--<option value="outros"> - Outros</option>--}}
                                {{--</optgroup>--}}
                                {{--</select>--}}
                                {{--</fieldset>--}}
                                <!-- Text input-->
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome: *">
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <input type="email" name="field2" class="form-control input-md" placeholder="Email: *">
                                        </div>
                                    </div>
                                    <!-- Select Basic -->
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <select id="selectbasic" name="selectbasic" class="form-control">
                                                <option value="evento"> - Eventos</option>
                                                <option value="cursos"> - Cursos</option>
                                                <option value="web"> - Desenvolvimento WEB</option>
                                                <option value="sistemas"> - Desenvolvimento de Softwares</option>
                                                <option value="recrutamento"> - Recrutamento</option>
                                                <option value="consultoria"> - Consultoria</option>
                                                <option value="outros"> - Outros</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <!-- Textarea -->
                                    <legend><span class="number">2</span> Informações: </legend>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <textarea name="field3" placeholder="Mensagem: *"></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="submit" value="Enviar" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
        </article>

        </div>

        <div id="info-contato" class="center-block">
            <div class="col-md-6 col-sm-6">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="col-md-3">
                        <div data-icon="ei-location" data-size="l"></div>
                    </div>
                    <div class="col-md-9 espacamento">
                        <span class="contato-top">UNIVERSIDADE DE PERNAMBUCO </br><i>Campus</i> Garanhuns</span>
                        <span class="contato-subtop"></br>R. Cap. Pedro Rodrigues, 105 - São José, Garanhuns - PE, 55295-110</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="col-md-10">
                    <div class="col-md-3">
                        <div data-icon="ei-envelope" data-size="l"></div>
                    </div>
                    <div class="col-md-9 espacamento">
                        <span class="contato-top">Email: empresa.tecjr@gmail.com </br></span>
                        <span class="contato-subtop">Telefone ou Whatsapp: 87 8122-7402</br></span>
                        <span class="contato-subtop">Ou procure algum funcionario da empresa, contato disponivel na Home.</span>
                    </div>



                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

    </section>

    <section id="map">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3941.95414904453!2d-36.49855768579221!3d-8.883855193621594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7070cc21055ecdd%3A0xb208d979910ba4dc!2sGaranhuns+Campus%7CUPE+-+Garanhuns+Campus!5e0!3m2!1spt-BR!2sbr!4v1503799147153" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

    </section>
@endsection