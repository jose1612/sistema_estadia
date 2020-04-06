<?php

namespace sisEstadia\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CorreoMensaje extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $consulta;
    public $fisios;
    public $pacientes;
    public $lesiones;
    public $estudios;

    public function __construct($consulta,$fisios,$pacientes,$lesiones,$estudios)
    {
        $this->consulta=$consulta;
        $this->fisios=$fisios;
        $this->pacientes=$pacientes;
        $this->lesiones=$lesiones;
        $this->estudios=$estudios;
        
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('vconsulta.consulta.msg');
        /*
        return $this->view('emails.msg');*/
    }
}
