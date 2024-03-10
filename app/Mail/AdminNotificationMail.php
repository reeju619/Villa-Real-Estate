<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $visitDetail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($visitDetail)
    {
        $this->visitDetail = $visitDetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hello@example.com') // Adjust the sender email
                    ->subject('New Visit Request')
                    ->view('frontend.email.adminNotification');
    }
}
