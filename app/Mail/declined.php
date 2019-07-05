<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class declined extends Mailable
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
         $post_title = session('titlexx');

         return $this->from('support@dstreet.com.ng','Dstreet')
         ->subject('Post Status On Dstreet')
         ->markdown('mails.declinedmarkdown')
         ->with('post_title',$post_title);
    }
}
