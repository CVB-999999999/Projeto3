<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostGraded extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $grade;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $grade)
    {
        $this->title = $title;
        $this->grade = $grade;
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
            ->view('mail.post-graded')
            ->subject('Post graded');
    }
}
