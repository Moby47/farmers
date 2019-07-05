<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class expire extends Mailable
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
         $ad_title = session('titlexxx');

         return $this->from('support@dstreet.com.ng','Dstreet')
         ->subject('Advert Status On Dstreet')
         ->markdown('mails.expiremarkdown')
         ->with('ad_title',$ad_title);
    }
}
