<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contato extends Mailable
{
    use Queueable, SerializesModels;

   public $dados;
    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->dados->email_n,$this->dados->name_n)->subject("Mensagem do site")->view('contato-envio');
    }
}
