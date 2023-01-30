<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Donor;

class RegisteredNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $donor;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Donor $donor)
    {
        $this->donor = $donor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Donor Registration')
            ->markdown('emails.registered');
    }
}
