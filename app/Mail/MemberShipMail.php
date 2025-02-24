<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;

class MemberShipMail extends Mailable
{
    use SerializesModels, Queueable;

    public $memberShip;

    public function __construct($memberShip)
    {
        $this->memberShip = $memberShip;
    }

    public function build()
    {
        return $this->subject('Welcome to One Nation - Your Journey Begins Now!')->view('emails.member-ship') // Make sure you create an email view in resources/views/emails/otp.blade.php
            ->with('otp', $this->memberShip);
    }
}
