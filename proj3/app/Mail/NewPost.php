<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPost extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $title;
    public $date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $title, $date)
    {
        $this->name = $name;
        $this->title = $title;
        $this->date = $date;

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
            ->view('mail.new-post')
            ->subject('New post in ' . $this->name);
    }
}
