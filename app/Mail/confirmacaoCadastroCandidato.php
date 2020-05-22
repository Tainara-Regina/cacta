<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class confirmacaoCadastroCandidato extends Mailable
{
    use Queueable, SerializesModels;
    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $user)
    { 
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

       $this->subject('Cacta Vagas - Confirmação de cadastro');
       $this->to($this->user->email,$this->user->name);

       return $this->markdown('email.emailConfirmacaoCandidato',[
        'user' => $this->user]);
   }
}
