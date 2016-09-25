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
        
    public $nombreReceptor; /*SE PASA DIRECTO A LA VISTA*/
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombreReceptor)
    {
        $this->nombreReceptor = $nombreReceptor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.welcome')
        ->subject('mensaje anank');
    }
}
