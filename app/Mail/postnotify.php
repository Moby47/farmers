<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class postnotify extends Mailable
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
        $poster = session('poster');
        $postersch = session('postersch');
        $postermailer = session('postermailer');

    return $this->from($postermailer,'Post by '.$poster)
    ->subject('New Post on Dstreet')
    ->markdown('mails.postnotify')
    ->with('poster',$poster)
    ->with('postersch',$postersch)
    ->with('postermailer',$postermailer);

    }
}
