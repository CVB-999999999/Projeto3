<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StdSubTutor extends Mailable
{
    use Queueable, SerializesModels;

    public $disc;
    public $stdName;
    public $stdMail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($disc, $stdName, $stdMail)
    {
        $this->disc = $disc;
        $this->stdName = $stdName;
        $this->stdMail = $stdMail;
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
            ->view('mail.std-sub-tutor')
            ->subject('Student Upload');
    }
}
