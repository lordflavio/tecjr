@extends('layouts.tamplate-principal')

@section('content')
    <section id="conteudo-cursos" style="margin-top: -20px;">
        <div class="container">
            <div class="row texto-espacamento">
                <h1 class="text-center">INSCRIÇÃO <span>{{$evento->titulo}}</span></h1>
                <p>Escolha a baixo o seu meio de pagamento </p>
                <div class="col-md-offset-1 pagamento">
                    <div class="col-md-2">
                        <a href="/evento-pagamento/boleto/{{$evento->nome}}">
                            <img class="center-block" src="{{url('imagens/boleto.png')}}" alt="Pagar com Boleto">
                            <h4 class="text-center">Pagar com Boleto</h4>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="/evento-pagamento/cartao/{{$evento->nome}}">
                            <img class="center-block" src="{{url('imagens/card.png')}}" width="160" style="height: 100px" alt="Pagar com Cartão">
                            <h4 class="text-center">Pagar com Cartão</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>   <br>
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



