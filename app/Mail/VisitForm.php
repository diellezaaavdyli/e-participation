<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VisitForm extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail, $name)
    {
        $this->mail = $mail;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.visitform')->with([
            'mail'=> $this->mail,
            'name'=> $this->name
        ]);
    }
}
