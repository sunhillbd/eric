<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;


    protected $user;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
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

//        $this->from('eselaw@gmail.com') if global mailfrom not set
        return $this->view('emails.email_verification')
                    ->with([
                        'name'=>$this->user->first_name.' '.$this->user->last_name,
                        'email'=>$this->user->email,
                        'activationCode'=>$this->user->activation_code,
                    ]);
    }
}
