@extends('layouts.tamplate-principal')

@section('content')
    <section id="conteudo-cursos" style="margin-top: -20px;">
        <div class="container">
            <div class="row texto-espacamento">
                <h1 class="text-center">INSCRIÇÃO <span>{{$evento->titulo}}</span></h1>
                <p>Clique no botão a baixo para gerar o boleto </p>

                <div class="col-md-12 pagamento">
                    <a href="#" id="payment-billet">
                        <img class="center-block" src="{{url('imagens/boleto.png')}}" alt="Pagar com Boleto">
                        <h4 class="text-center">Gerar Boleto</h4>
                    </a>
                </div>
                @include('includes.preloader')
            </div>

            <form id="form" action="{{route('curso.store')}}" method="POST">
                {{ method_field('POST')}}
                <input style="display: none" type="text" name="busca"  id="titulo" value="{{$evento->nome}}">
                <input style="display: none" type="text" name="type"  id="titulo" value="2">
            </form>
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

@push('scripts')
<!--URL PagSeguro Transparent-->
<script src="{{config('pagseguro.url_transparent_js')}}"></script>

<script>
    $(function(){
        $("#payment-billet").click(function(){
            setSessionId();

            $(".preloader").show();

            return false;
        });
    });

    function setSessionId()
    {
        $.ajax({
            url: "{{route('pagseguro.code.transparent')}}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function(data){
            console.log(data);
            PagSeguroDirectPayment.setSessionId(data);
            paymentBillet();
        }).fail(function(){
            $(".preloader").hide();
            alert("Fail request... :-(");
        }).always(function(){

        });
    }

    function paymentBillet()
    {
        var sendHash = PagSeguroDirectPayment.getSenderHash();

        var data = $('form#form').serialize()+"&sendHash="+sendHash;

        $.ajax({
            url: "{{route('pagseguro.billet')}}",
            method: "POST",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function(data){
            console.log(data);

            if(data.success) {
                window.open('/welcome', '_blank');
                location.href=data.payment_link;
            } else {
                alert("Falha!");
            }
        }).fail(function(){
            alert("Fail request... :-(");
        }).always(function(){
            $(".preloader").hide();
        });
    }
</script>
@endpush



