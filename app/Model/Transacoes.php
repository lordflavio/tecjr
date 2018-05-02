<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\curso;
use App\Model\Curso_inscritos;
use App\Model\Evento_inscritos;

class Transacoes extends Model
{
    protected $table = "transacoes";
       protected $fillable = ['user_id', 'reference', 'code', 'status', 'payment_method', 'date'];
       
       
    public function cursos()
    {
        return $this->belongsToMany(curso::class, 'curso_inscritos')
                        ->withPivot(['certificado']);
    }
    
    public function scopeUser($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }

    public function newTransacao($object, $reference, $code, $status = 1, $paymentMethod = 2, $type)
    {
        $order = $this->create([
            'user_id'           => auth()->user()->id,
            'reference'         => $reference,
            'code'              => $code,
            'status'            => $status,
            'payment_method'    => $paymentMethod,
            'date'              => date('Y-m-d'),
        ]);

        if($type == 1){
            Curso_inscritos::create(array(
                'participanteId'    => auth()->user()->id,
                'cursosId'          => $object->id,
                'transacaoId'       => $order->id,
                'certificado'            => 1,
            ));

        }else if($type == 2){
            Evento_inscritos::create(array(
                'participanteId'    => auth()->user()->id,
                'eventosId'          => $object->id,
                'transacaoId'       => $order->id,
            ));
        }

    }
    public function newTransacaoFree($object, $reference, $code, $status = 1, $paymentMethod = 2, $type, $paticipante)
    {
        $order = $this->create([
            'user_id'           => $paticipante,
            'reference'         => $reference,
            'code'              => $code,
            'status'            => 3,
            'payment_method'    => $paymentMethod,
            'date'              => date('Y-m-d'),
        ]);

        if($type == 1){
            Curso_inscritos::create(array(
                'participanteId'    => $paticipante,
                'cursosId'          => $object->id,
                'transacaoId'       => $order->id,
                'certificado'            => 0,
            ));

        }else if($type == 2){
            Evento_inscritos::create(array(
                'participanteId'    => $paticipante,
                'eventosId'          => $object->id,
                'transacaoId'       => $order->id,
            ));
        }

    }
        
      
    
    
    
    public function getStatus($status)
    {
        $statusA = [
            1 => 'Aguardando pagamento',
            2 => 'Em análise',
            3 => 'Paga',
            4 => 'Disponível',
            5 => 'Em disputa',
            6 => 'Devolvida',
            7 => 'Cancelada',
            8 => 'Debitado',
            9 => 'Retenção temporária',
        ];
        
        return $statusA[$status];
    }
    
     public function getLabel($status)
    {
        $statusA = [
            1 => 'label-primary',
            2 => 'label-warning',
            3 => 'label-success',
            4 => 'label-success',
            5 => 'label-default',
            6 => 'label-info',
            7 => 'label-danger',
            8 => 'label-default',
            9 => 'label-default',
        ];
        
        return $statusA[$status];
    }
    
    public function getMethodPayment($method)
    {
        $paymentsMethods = [
            1 => 'Cartão de crédito',
            2 => 'Boleto',
            3 => 'Débito online (TEF)',
            4 => 'Saldo PagSeguro',
            5 => 'Oi Paggo',
            7 => 'Pagamento Precencial',
        ];
        
        return $paymentsMethods[$method];
    }
    
    
//    public function getDateAttribute($value)
//    {
//        return Carbon::parse($value)->format('d/m/Y');
//    }
//
//
//    public function getDateRefreshStatusAttribute($value)
//    {
//        return Carbon::parse($value)->format('d/m/Y');
//    }
    
      
    public function changeStatus($newStatus)
    {
        $this->status = $newStatus;
        $this->save();
    }

    public function getDiaSemana(){
        $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
        $mes_extenso = array(
            'Jan' => 'Janeiro',
            'Feb' => 'Fevereiro',
            'Mar' => 'Marco',
            'Apr' => 'Abril',
            'May' => 'Maio',
            'Jun' => 'Junho',
            'Jul' => 'Julho',
            'Aug' => 'Agosto',
            'Nov' => 'Novembro',
            'Sep' => 'Setembro',
            'Oct' => 'Outubro',
            'Dec' => 'Dezembro'
        );

        $data = date('Y-m-d');

        $diasemana_numero = date('w', strtotime($data));

        return $diasemana[$diasemana_numero].', '.date('d', strtotime($data)).' de '.$mes_extenso[date('M',strtotime($data))].' de '.date('Y',strtotime($data));
    }

}
