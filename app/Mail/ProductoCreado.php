<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductoCreado extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre, $precio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$precio)
    {
        //
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->subject('Nuevo producto creado')
                    ->view('mails.producto',compact('nombre','precio'));
    }
}
