<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class decline_ad extends Mailable
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
         $titlez = session('title_ad_dec');
 
         return $this->from('support@dstreet.com.ng','Dstreet')
         ->subject('Advert Decline Status On Dstreet')
         ->markdown('mails.decline_admarkdown')
         ->with('titlez',$titlez);
    }
}
