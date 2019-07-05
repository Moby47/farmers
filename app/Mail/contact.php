<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contact extends Mailable
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
     $username = session('namex');
     $usermail = session('mailx');
      $usermessage = session('messagex');

        return $this->from($usermail,$username)
        ->subject($username.' '.'Contacted Dstreet')
        ->markdown('mails.contactmarkdown')
        ->with('usermessage',$usermessage);
    }
}
