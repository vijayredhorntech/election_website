<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Welcome',
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.welcome',
        );
    }

    public function attachments()
    {
        return [];
    }
}
