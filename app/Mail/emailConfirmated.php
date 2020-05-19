<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class emailConfirmated extends Mailable
{
    use Queueable, SerializesModels;
    public $subject ='Nuevo mensaje de cliente';
    public $msj;

    /**
     * Crea una nueva instancia del mensaje
     *
     * @return void
     */
    // Constructor de la clase email
    public function __construct($msj)
    {
      $this->msj=$msj;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // Retorna la vista donde ira el mensaje
    public function build()
    {
        return $this->view('emails.email-recibido');
    }
}  
