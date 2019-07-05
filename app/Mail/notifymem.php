<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notifymem extends Mailable
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
        $poster = session('poster');
        $newurl = session('newurl');
        $ptitle = session('ptitle');

    return $this->from('info2dstreet@gmail.com')
    ->subject('New Post by'.' '.$poster.' '.'on Dstreet')
    ->markdown('mails.notify_members_markdown')
    ->with('poster',$poster)
    ->with('ptitle',$ptitle)
    ->with('newurl',$newurl);
    }
}
