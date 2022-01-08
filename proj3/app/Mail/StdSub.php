<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StdSub extends Mailable
{
    use Queueable, SerializesModels;

    public $disc;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($disc)
    {
        $this->disc = $disc;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('atc02012022@gmail.com', 'A Tutoring Company Admin')
            ->view('mail.std-sub')
            ->subject('Submission Uploaded');
    }
}

