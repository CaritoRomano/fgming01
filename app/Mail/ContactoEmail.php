<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class ContactoEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var
     */
        
    public $email;   /*SE PASA DIRECTO A LA VISTA*/
    public $nombre;
    public $mensaje;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $email, $mensaje)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.emailContacto') 
        ->subject('Mensaje de Contacto');
        
    }
}
