<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Verification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
       $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fromName = 'DellyMan';
        $fromEmail = 'dellyman@gmail.com';
        $subject = 'Email Verification';
      

        return $this->view('mail.verify')
                ->from($fromEmail , $fromName)
                ->replyTo($fromEmail , $fromName)
                ->subject($subject)
                ->with(['data' => $this->data]);
    }
}
