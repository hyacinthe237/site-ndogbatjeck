<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The passwordMail object instance.
     *
     * @var user
     */
    public $user;

    /**
     * constructor of send mail.
     *
     * @return $this
     */
    public function __construct($user)
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
        return $this->markdown('backend.mails.send')
                ->with([
                    'user' => $this->user
                    ]);
    }
}
