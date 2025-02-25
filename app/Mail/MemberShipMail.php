<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;

class MemberShipMail extends Mailable
{
    use SerializesModels, Queueable;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Welcome to One Nation - Your Journey Begins Now!')->view('emails.member-ship')->with('data', $this->data);
    }
}
