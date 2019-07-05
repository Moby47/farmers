<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class reported_ad extends Mailable
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
        $titleadx= session('titleadx');
 
        return $this->from('support@dstreet.com.ng','Dstreet')
        ->subject('Ad Report On Dstreet')
        ->markdown('mails.reported_admarkdown')
        ->with('titleadx',$titleadx);
    }
}
