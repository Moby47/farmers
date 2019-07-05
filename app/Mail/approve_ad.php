<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class approve_ad extends Mailable
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
        $title_ad = session('title_ad');
        $url_ad = session('url_ad');

        return $this->from('support@dstreet.com.ng','Dstreet')
        ->subject('Advert Approval On Dstreet')
        ->markdown('mails.approve_admarkdown')
        ->with('title_ad',$title_ad)
        ->with('url_ad',$url_ad);
    }
}
