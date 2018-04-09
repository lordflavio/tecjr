@extends('layouts.tamplate-principal')

@section('content')
<section id="conteudo-cursos" style="margin-top: -20px;">
    <div class="container">
        <div class="row texto-espacamento">
            <h1 class="text-center">INSCRIÇÃO <span>{{$curso->titulo}}</span></h1>
            <p> Preencha as informaçãoes abaixo para pagar com o cartão </p>
            <div class="col-xs-12 col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Pagamento com Cartão
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form id="payment_form">
                            {{ method_field('POST')}}
                            <input type="hidden" name="brand" >
                            <input type="hidden" name="card_token" >
                            
                            <input style="display: none" type="text" name="busca"  id="curso" value="{{$curso->nome}}">
                            <input style="display: none" type="text" name="type"  id="typo" value="1">
                            
                            <div class="form-group">
                                <label for="cardNumber">
                                    Cartão Número</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cardNumber" id="cardNumber" placeholder="Numero de Cartão Valido"
                                           required autofocus />
                                    <span class="input-group-addon"><i class=" fa fa-credit-card"></i></span>
                                </div>
                            </div>
                  
                                <!-- Name -->
                                <div class="control-group">
                                    <label class="control-label"  for="username">Nome Impresso no Cartão</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="card_holder_name" id="card_holder_name" placeholder="JOSE CAVALCANTE F SILVA"
                                               required  />
                                    </div>
                                </div>
                         
                                <div class="row" style="margin-top: 10px"> 
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label for="expityMonth">
                                            Data de Expiração</label>
                                        <div class="col-xs-6 col-lg-6 pl-ziro">
                                            <input type="text" class="form-control" name="card_expiration_month" id="card_expiration_month" placeholder="MM" required />
                                        </div>
                                        <div class="col-xs-6 col-lg-6 pl-ziro">
                                            <input type="text" class="form-control" name="card_expiration_year" id="card_expiration_year" placeholder="YY" required /></div>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label for="cvCode">
                                            Codigo do Cartão</label>
                                        <input type="password" class="form-control" name="card_cvv" id="card_cvv" placeholder="CVV2" required />
                                    </div>
                                </div><br>

                                <div class="form-group col-xs-12 col-md-12 ">
                                    <label class="text-center">Parcelas</label>
                                    <select class="form-control" id="installments" name="installments" disabled>
                                    </select>
                                </div>
                                
                                <div class="form-group col-xs-12 col-md-12">
                                   <h3>Infomações do dono do Cartão</h3>
                                </div>
                                
                                <div class="form-group col-xs-6 col-md-6 ">
                                    <label class="text-center">CPF</label>
                                    <input type="text" name="cpf"  class="form-control " maxlength="15" placeholder="111.111.111.11" id="cpf" required="">
                                    
                                </div>
                                
                                <div class="form-group col-xs-6 col-md-6 ">
                                    <label class="text-center">Data de Nascimento</label>
                                    <input type="text" name="data"  class="form-control " maxlength="15" id="data" placeholder="01/01/1999" required="">
                                </div>
                                
                                <div class="form-group col-xs-6 col-md-6 ">
                                    <label class="text-center">Telefone</label>
                                    <input type="text" name="telefone2" class="form-control" id="telefone2" placeholder="(99)9999-9999" required="">
                                </div>
                                
                            </div>
                                <button type="submit" class="btn btn-success btn-lg">
                                    Pagar com Cartão
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                </button>
                        </form>
                    </div>
                </div>
                <br/>
            </div>

           
            </form>
        </div>
        @include('includes.preloader')
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

@push('scripts')
<!--URL PagSeguro Transparent-->
<script src="{{config('pagseguro.url_transparent_js')}}"></script>

<script>
    $(function(){
        // Recupera o session id que o PagSeguro precisa para validar a transação
        setSessionId();

        // Quando o formulário com os dados do cartão é submetido
        $("#payment_form").submit(function() {
            // Inicia o preloader        
            startPreloader();

            // Cria o token do cartão
            createCardToken();
            
            // Não permite que o formulário seja submetido
            return false;
        });

        $('input[name=cardNumber]').blur(function(){
            if ( $(this).val() != "" )
                getBrand();
        });
    });

    /*
    * Recupera a bandeira do cartão
    * Documentação: https://dev.pagseguro.uol.com.br/documentacao/pagamento-online/pagamentos/pagamento-transparente#obter-bandeira-cartao
    */
    function getBrand()
    {
        PagSeguroDirectPayment.getBrand({
            cardBin: $('input[name=cardNumber]').val().replace(/ /g, ''), // Pega o número do cartão, informado pelo usuário (no input)
            success: function(response) {
                // Nome da bandeira do cartão: visa, master, elo e etc.
                var brand = response.brand.name;

                // Armazena o nome da bandeira do cartão em um campo oculto (hidden)
                $('input[name=brand]').val(brand);

                // Função que mostra as opções de parlamento
                getInstallments();
            },
            error: function (response) {
                console.log(response);
                showError();
            }//showError()// Caso dê erros, apresenta para o usuário
        });
    }

    /*
    * Exibe as opções de parcelamento de acordo com o total da compra
    * Documentação: https://dev.pagseguro.uol.com.br/documentacao/pagamento-online/pagamentos/pagamento-transparente#opcoes-parcelamento
    */
    function getInstallments()
    {
        // Mostra um "preloader"
        $('select[name=installments]').append('<option value="">Carregando...</option>');

        // Recupera as opções de parcelamento
        PagSeguroDirectPayment.getInstallments({
            amount: {{str_replace(",", ".", $curso->valorInscricao)}}, // Total do carrinho $$
            maxInstallmentNoInterest: 1,/*{quantidade de parcelas sem juros}*/
            brand: $('input[name=brand]').val(), // Nome da bandeira do cartão
            success: function (response) {
                // Recupera o nome da bandeira do cartão
                var brand = $('input[name=brand]').val();

                // Array com as opções de parcelamento
                var installments = response.installments[brand];

                // Habilita o campo de parcelas, que por padrão é desativado
                $('select[name=installments]').removeAttr('disabled');

                // Retira o preloader
                $('select[name=installments]').find('option').remove();

                // Cria os options no <select> com as opções de parcelamento
                $.each( installments, function( index, value ) {
                    // Texto a ser exibido no <option>, ex: 12x de 12.20 - Total: 50.00
                    var textOption = value.quantity+' x de R$ '+value.installmentAmount+' - Total: R$ '+value.totalAmount;

                    // Value option (quantidade de parcelas / valor)
                    var valueOption = value.quantity + ' / ' +  value.installmentAmount;

                    // Adiciona os options no select
                    $('select[name=installments]').append('<option value="'+ valueOption +'">'+ textOption +'</option>');
                });
            },
            error: function (response) {
                console.log(response);
                showError();
            },//, // Exibe erros
            complete: endPreloader() // Finaliza o preloader
        });
    }

    
    /*
    * Cria uma sessão para valida essa transação
    * Documentação: https://dev.pagseguro.uol.com.br/documentacao/pagamento-online/pagamentos/pagamento-transparente#sessao
    */
    function setSessionId()
    {
        // Inicia o preloader
        startPreloader();

        // Envia a requisição AJAX para a API do PagSeguro para retornar o token de sessão.
        $.ajax({
            url: "{{route('pagseguro.code.transparent')}}", // URL da requisição
            method: "POST", // Método de requisição (verbo http)
            headers: {
                // Pega o content do meta csrf-token, para proteção com ataques CSRF
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function(data){
            // Define a sessão com o token retornado da API do PagSeguro
            PagSeguroDirectPayment.setSessionId(data);
        }).fail(function() {
            // Exibe os erros  
            showError();
        }).always(function() {
            // Finaliza o preloader
            endPreloader();
        });
    }


    /*
    * Obter o token do cartão de crédito
    * Documentação: https://dev.pagseguro.uol.com.br/documentacao/pagamento-online/pagamentos/pagamento-transparente#obter-token-cartao
    */
    function createCardToken()
    {
        PagSeguroDirectPayment.createCardToken({
            cardNumber: $('input[name=cardNumber]').val().replace(/ /g, ''), // Número do cartão informado sem espaços
            brand: $('input[name=brand]').val(), // Bandeira do cartão
            cvv: $('input[name=card_cvv]').val(), // Código de segurança
            expirationMonth: $('input[name=card_expiration_month]').val(), // Mês de expiração
            expirationYear: $('input[name=card_expiration_year]').val(), // Ano de expiração
            success: function(response){
                // Coloca o token retornado da API no campo oculto
                $('input[name=card_token]').val(response.card.token);

                // Chama o método que faz o pagamento com cartão
                paymentCard();
            },
            error: function (response) {
                console.log(response);
                showError();
            }
        });
    }


    /*
    * Inicia o pagamento por cartão
    * Documentação: https://dev.pagseguro.uol.com.br/documentacao/pagamento-online/pagamentos/pagamento-transparente#efetuar-pagamento
    */    
    function paymentCard()
    {
        startPreloader();

        // Recupera todos os dados do formulário
        var data = $('#payment_form').serialize();

        // Recupera a hash da transação
        var senderHash = PagSeguroDirectPayment.getSenderHash();

        // Envia a requisição AJAX com os dados do cartão
        $.ajax({
            url: "{{route('pagseguro.card')}}", // URL da requisição
            method: "POST", // Método de requisição (verbo http)
            headers: {
                // Pega o content do meta csrf-token, para proteção com ataques CSRF
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data+'&senderHash='+senderHash // Passa todos os dados do formulário para a requisição
        }).done(function(data){
            if( data.success ) {
                // Redireciona para ver os pedidos
                window.location.href = "{{ route('welcome') }}";
            } else {
                showError();
            }
        }).fail(function() {
            // Exibe os erros  
            showError();
        }).always(function() {
            // Finaliza o preloader
            endPreloader();
        });
    }


    /*
    * Função de preloader (exibe)
    */
    function startPreloader()
    {
        $(".preloader").show();

        // Oculta algum erro se tiver exibindo:
        $("#error").hide();
    }


    /*
    * Função de preloader (oculta)
    */
    function endPreloader()
    {
        $(".preloader").hide();
    }


    /*
    * Exibe uma mensagem de erro
    */
    function showError()
    {
        $("#error").show();

        // Finaliza o preloader em caso de erros
        endPreloader();
    }
</script>
</script>
@endpush




