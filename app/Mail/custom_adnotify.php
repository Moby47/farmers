<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class custom_adnotify extends Mailable
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
       $creator2 = session('ad_creater2');
       $creatormail2 = session('ad_mailer2');

   return $this->from($creatormail2,'Custom Ad Requested by '.$creator2)
   ->subject('New Custom Ad Request on Dstreet')
   ->markdown('mails.custom_adnotify_markdown')
   ->with('creator2',$creator2)
   ->with('creatormail2',$creatormail2);

    }
}
