<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use SerializesModels;

    public $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function build()
    {
        return $this->subject('One Nation - Your One-Time Password (OTP)')->view('emails.otp') // Make sure you create an email view in resources/views/emails/otp.blade.php
            ->with('otp', $this->otp);
    }
}
