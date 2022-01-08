<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TutorAssgStd extends Mailable
{
    use Queueable, SerializesModels;

    public $disc;
    public $std;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($disc, $std)
    {
        $this->disc = $disc;
        $this->std = $std;
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
            ->view('mail.tutor-assg-std')
            ->subject('New Assigment');
    }
}
