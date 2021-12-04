<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusToggle extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($active)
    {
        if($active) {
            $this->status = 'Reactivated';
        } else {
            $this->status = 'Deactivated';
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
            ->from('atc28112021@outlook.pt', 'A Tutoring Company Admin')
            ->view('mail.status-toggle')
            ->subject('Account Status');
    }
}
