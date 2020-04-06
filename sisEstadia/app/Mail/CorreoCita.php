<?php

namespace sisEstadia\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CorreoCita extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $citas;
    public $fisios;
    public $pacientes;
    public $lesiones;
    public $estudios;

    public function __construct($citas,$fisios,$pacientes,$lesiones,$estudios)
    {
        //
        $this->citas=$citas;
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
        return $this->view('vconsulta.cita.msg');
    }
}
