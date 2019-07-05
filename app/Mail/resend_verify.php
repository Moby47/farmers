<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class resend_verify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            //retrieve data fro session
            $vcode = session('vcode');
            $vmail = session('vusermail');

        return $this->from('support@dstreet.com.ng','Dstreet')
        ->subject('Email Verification')
        ->markdown('mails.resend_verify_markdown')
        ->with('vcode',$vcode)
        ->with('vmail',$vmail);
    }
}
