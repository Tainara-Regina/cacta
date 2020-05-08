<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class redefinirSenha extends Mailable
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

       $this->subject('Cacta - Redefinição de senha');
       $this->to($this->user->email);

       return $this->markdown('email.redefinicaoSenha',[
        'user' => $this->user
    ]);
   }
}
