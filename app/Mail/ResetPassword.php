<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;


    protected  $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\User $user)
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
        return $this->view('emails.reset_password')
            ->with([
                'name'=>$this->user->first_name.' '.$this->user->last_name,
                'email'=>$this->user->email,
                'password_reset_token'=>$this->user->password_reset_token,
            ]);
    }
}
