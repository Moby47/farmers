<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class reported_post extends Mailable
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
        $titlepost= session('titlepost');
 
        return $this->from('support@dstreet.com.ng','Dstreet')
        ->subject('Post Report On Dstreet')
        ->markdown('mails.reported_postmarkdown')
        ->with('titlepost',$titlepost);
    }
}
