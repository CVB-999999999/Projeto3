<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminForceResetPasswd extends Mailable
{
    use Queueable, SerializesModels;

    public $str;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($str)
    {
        $this->str = $str;
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
            ->view('mail.admin-force-reset-passwd')
            ->subject('Password Change');
    }
}
