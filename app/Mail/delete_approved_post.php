<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class delete_approved_post extends Mailable
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
        $title = session('titlexxxx');
        $report = session('reportx');

        return $this->from('support@dstreet.com.ng','Dstreet')
        ->subject('Post Status On Dstreet')
        ->markdown('mails.delete_approved_post')
        ->with('title',$title)
        ->with('report',$report);
    }
}
