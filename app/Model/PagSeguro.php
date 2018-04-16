<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client as Guzzle;
use App\Model\participante;

class PagSeguro extends Model
{
    use PagSeguroTrait;
    
    private $reference, $user;
    private $currency = 'BRL';
    private $participante;

    public function __construct()
    {
        $this->reference = uniqid(date('YmdHis'));
        
        $this->user = auth()->user();
        
        if(isset($this->user->id))
        $this->participante = participante::find($this->user->id);
    }

    public function getSessionId()
    {
        $params = $this->getConfigs();
        $params = http_build_query($params);
        
        $guzzle = new Guzzle;
        $response = $guzzle->request('POST', config('pagseguro.url_transparent_session'), [
            'query' => $params,
        ]);
        $body = $response->getBody();
        $contents = $body->getContents();
        
        $xml = simplexml_load_string($contents);
        
        return $xml->id;
    }
    
    public function paymentBillet($sendHash, $object)
    {
        $params = [
            'senderHash' => $sendHash,
            'paymentMode' => 'default',
            'paymentMethod' => 'boleto',
            'currency' => $this->currency,
            'reference' => $this->reference,
        ];
        //$params = http_build_query($params);
        $params = array_merge($params, $this->getConfigs());
        $params = array_merge($params, $this->getItems($object));
        $params = array_merge($params, $this->getSender());
        $params = array_merge($params, $this->getShipping());
        
        $guzzle = new Guzzle;
        $response = $guzzle->request('POST', config('pagseguro.url_payment_transparent'), [
            'form_params' => $params,
        ]);
        $body = $response->getBody();
        $contents = $body->getContents();
        
        $xml = simplexml_load_string($contents);
        
        return [
            'success'       => true,
            'payment_link'  => (string)$xml->paymentLink,
            'reference'     => $this->reference,
            'code'          => (string)$xml->code,
        ];
    }
    
    
     public function paymentCredCard($request, $object)
    {
        // Pega as informações de parcelas (installments) selecionada pelo usuário
        $installments = explode(' / ', $request->installments);
        // Quantidade de parcelas
        $installmentQuantity = $installments[0];
        // Valor da parcela
        $installmentValue = number_format($installments[1], 2, '.', ''); // (O valor da parcela também pode ser calculado dividindo o total do carrinho pela quantidade de parcelas: $this->cart->total() / $installmentQuantity)

        // Opções enviadas para a API do PagSeguro
        $params = [
            'senderHash'                    => $request->senderHash,
            'paymentMode'                   => 'default',
            'paymentMethod'                 => 'creditCard',
            'currency'                      => $this->currency,
            'reference'                     => $this->reference,
            'creditCardToken'               => $request->card_token,
            'installmentQuantity'           => $installmentQuantity,
            'installmentValue'              => $installmentValue,
            'noInterestInstallmentQuantity' => 12,// Quantidade de parcelas sem juros
        ];
        $params = array_merge($params, $this->getConfigs());
        $params = array_merge($params, $this->getItems($object));
        $params = array_merge($params, $this->getSender());
        $params = array_merge($params, $this->getShipping());
        $params = array_merge($params, $this->getCreditCard($request));
        $params = array_merge($params, $this->billingAddress());

        try {
            $guzzle = new Guzzle;
            $response = $guzzle->request('POST', config('pagseguro.url_payment_transparent'), [
                'form_params' => $params,
            ]);
            $body = $response->getBody();
            $contents = $body->getContents();
            
            $xml = simplexml_load_string($contents);
            return [
                'success'       => true,
                'reference'     => $this->reference,
                'code'          => (string)$xml->code,
                'status'        => (string)$xml->status,
            ];
        } catch ( Throwable $e) {
            return [
                'success'       => false,
                'reference'     => (string)$e->getMessage(),
                'code'          => (string)$e->getCode(),
            ];
        
        } catch ( ServerException $e) {
            return [
                'success'       => false,
                'reference'     => (string)$e->getMessage(),
                'code'          => (string)$e->getCode(),
            ];
        
        } catch ( ClientException $e) {
            return [
                'success'       => false,
                'reference'     => (string)$e->getMessage(),
                'code'          => (string)$e->getCode(),
            ];
        }
    }
    
//     public function paymentCredCard($request)
//    {
//        $params = [
//            'email' => config('pagseguro.email'),
//            'token' => config('pagseguro.token'),
//            'senderHash' => $request->senderHash,
//            'paymentMode' => 'default',
//            'paymentMethod' => 'boleto',
//            'currency' => 'BRL',
//            'itemId1' => '0001',
//            'itemDescription1' => 'Produto PagSeguroI',
//            'itemAmount1' => '99999.99',
//            'itemQuantity1' => '1',
//            'itemWeight1' => '1000',
//            'itemId2' => '0002',
//            'itemDescription2' => 'Produto PagSeguroII',
//            'itemAmount2' => '99999.98',
//            'itemQuantity2' => '2',
//            'itemWeight2' => '750',
//            'reference' => 'REF1234',
//            'senderName' => 'Jose Comprador',
//            'senderAreaCode' => '99',
//            'senderPhone' => '99999999',
//            'senderEmail' => 'c28138693772801546687@sandbox.pagseguro.com.br',
//            'senderCPF' => '54793120652',
//            'shippingType' => '1',
//            'shippingAddressStreet' => 'Av. PagSeguro',
//            'shippingAddressNumber' => '9999',
//            'shippingAddressComplement' => '99o andar',
//            'shippingAddressDistrict' => 'Jardim Internet',
//            'shippingAddressPostalCode' => '99999999',
//            'shippingAddressCity' => 'Cidade Exemplo',
//            'shippingAddressState' => 'SP',
//            'shippingAddressCountry' => 'ATA',
//            'creditCardToken'=>$request->cardToken,
//            'installmentQuantity'=>1,
//            'installmentValue'=>300021.45,
//            'noInterestInstallmentQuantity'=>2,
//            'creditCardHolderName'=>'Jose Comprador',
//            'creditCardHolderCPF'=>'11475714734',
//            'creditCardHolderBirthDate'=>'01/01/1900',
//            'creditCardHolderAreaCode'=>99,
//            'creditCardHolderPhone'=>99999999,
//            'billingAddressStreet'=>'Av. PagSeguro',
//            'billingAddressNumber'=>9999,
//            'billingAddressComplement'=>'99o andar',
//            'billingAddressDistrict'=>'Jardim Internet',
//            'billingAddressPostalCode'=>99999999,
//            'billingAddressCity'=>'Cidade Exemplo',
//            'billingAddressState'=>'SP',
//            'billingAddressCountry'=>'ATA',
//        ];
//        //$params = http_build_query($params);
//        
//        $guzzle = new Guzzle;
//        $response = $guzzle->request('POST', config('pagseguro.url_payment_transparent_sandbox'), [
//            'form_params' => $params,
//        ]);
//        $body = $response->getBody();
//        $contents = $body->getContents();
//        
//        $xml = simplexml_load_string($contents);
//        
//        return $xml->code;
//    }
    
    
    public function getStatusTransaction($notificationCode)
    {
        $configs = $this->getConfigs();
        $params = http_build_query($configs);
        
        $guzzle = new Guzzle;
        $response = $guzzle->request('GET', config('pagseguro.url_notification')."/{$notificationCode}", [
            'query' => $params,
        ]);
        $body = $response->getBody();
        $contents = $body->getContents();
        
        $xml = simplexml_load_string($contents);

        return [
            'status'    => (string) $xml->status,
            'reference' => (string) $xml->reference,
        ];
        
        
    }
}
