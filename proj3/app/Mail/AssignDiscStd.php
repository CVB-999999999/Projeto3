<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssignDiscStd extends Mailable
{
    use Queueable, SerializesModels;

    public $disc;
    public $tutor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($disc, $tutor)
    {
        $this->disc = $disc;
        $this->tutor = $tutor;
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
            ->view('mail.assign-disc-std')
            ->subject('New Assigment');
    }
}
