<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ToggleTutorCatgStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $active;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $active)
    {
        $this->name = $name;

        if ($active == true) {
            $this->active = 're-enabled';
        } else {
            $this->active = 'disabled';
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(env('MAIL_USERNAME'), 'A Tutoring Company Admin')
            ->view('mail.toggle-tutor-catg-status')
            ->subject('Assigment in Discipline changed');
    }
}
