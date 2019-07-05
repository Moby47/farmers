<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class adnotify extends Mailable
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
       $creator = session('ad_creater');
       $creatormail = session('ad_mailer');

   return $this->from($creatormail,'Ad Placement by '.' '.$creator)
   ->subject('New Ad on Dstreet')
   ->markdown('mails.adnotify_markdown')
   ->with('creator',$creator)
   ->with('creatormail',$creatormail);

    }
}
