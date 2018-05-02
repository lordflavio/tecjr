<?php

namespace App\Model;
use GuzzleHttp\Client as Guzzle;

trait PagSeguroTrait
{
    public function getConfigs()
    {
        return [
            'email' => config('pagseguro.email'),
            'token' => config('pagseguro.token'),
        ];
    }
    
    public function setCurrency($currency, $object)
    {
        $this->currency = $currency;
    }
    
    public function getItems($object)
    {
        $items = [];

        $posistion = 1;

        if(isset($object->dateInicioIns)){
            $description = "Evento Academico organizado pela Empresa Junior (TecJr)";
            $custo = $object->valor_inscricao;
        }else{
            $description = "Curso de tecnico organizado pela Empresa Junior (TecJr)";
            $custo = $object->valorInscricao;
        }

        //dd($description);

        $items["itemId{$posistion}"]            = $object->id;
        $items["itemDescription{$posistion}"]   = $description;
        $items["itemAmount{$posistion}"]        = str_replace(",", ".", $custo);
        $items["itemQuantity{$posistion}"]      = '1';

       

        return $items;
        /*
        return [
            'itemId1' => '0001',
            'itemDescription1' => 'Produto PagSeguroI',
            'itemAmount1' => '99999.99',
            'itemQuantity1' => '1',
            'itemWeight1' => '1000',
            'itemId2' => '0002',
            'itemDescription2' => 'Produto PagSeguroII',
            'itemAmount2' => '99999.98',
            'itemQuantity2' => '2',
            'itemWeight2' => '750',
        ];
         */
    }
    
    
    public function getSender()
    {
        $cpf =   $this->limpa($this->participante->cpf);
        $phone = $this->limpa(substr($this->participante->telefone, 4,9));
        $nome = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $this->participante->nome ) );

        return [
            'senderName'        => $nome,
            'senderAreaCode'    => $this->participante->area_cod,
            'senderPhone'       => $phone,
            'senderEmail'       => $this->user->email,
            'senderCPF'         => $cpf,
        ];
    }
    
    public function getShipping()
    {
        return [
            'shippingType'                  => '1',
            'shippingAddressStreet'         => $this->participante->endereco,
            'shippingAddressNumber'         => $this->participante->numero,
            'shippingAddressComplement'     => $this->participante->bairro,
            'shippingAddressDistrict'       => $this->participante->bairro,
            'shippingAddressPostalCode'     => $this->limpa($this->participante->cep),
            'shippingAddressCity'           => $this->participante->cidade,
            'shippingAddressState'          => $this->participante->estado,
            'shippingAddressCountry'        => $this->participante->pais,
        ];
    }
    
    
    public function getCreditCard($request)
    {
        $cod = substr($request->telefonecard, 1,2);
        $fone = $this->limpa(substr($this->participante->telefone, 4,9));
        return [
            'creditCardHolderName'      => $request->card_holder_name,
            'creditCardHolderCPF'       => $this->limpa($request->cpf),
            'creditCardHolderBirthDate' => $request->data,
            'creditCardHolderAreaCode'  => $cod,
            'creditCardHolderPhone'     => $fone,
        ];
    }


    public function billingAddress()
    {
        return [
            'billingAddressStreet'      => $this->participante->endereco,
            'billingAddressNumber'      => $this->participante->numero,
            'billingAddressComplement'  => $this->participante->bairro,
            'billingAddressDistrict'    => $this->participante->bairro,
            'billingAddressPostalCode'  => $this->limpa($this->participante->cep),
            'billingAddressCity'        => $this->participante->cidade,
            'billingAddressState'       => $this->participante->estado,
            'billingAddressCountry'     => 'BRL',
        ];
    }
    
    public function limpa($valor) {
        $valor = trim($valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace("-", "", $valor);
        return $valor;
    }
}