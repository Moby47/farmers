<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class school_change extends Mailable
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
        $school = session('sch');

    return $this->from('support@dstreet.com.ng','Dstreet')
    ->subject('Change of School')
    ->markdown('mails.scholl_change_markdown')
    ->with('school',$school);
    }
}
