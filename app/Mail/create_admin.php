<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class create_admin extends Mailable
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
         //retrieve data from session
         $mail = session('mail');
         $pass = session('pass');
 
         return $this->from('support@dstreet.com.ng','Dstreet')
         ->subject('Admin Account On Dstreet')
         ->markdown('mails.create_adminmarkdown')
         ->with('mail',$mail)
         ->with('pass',$pass);
      
    }
}
