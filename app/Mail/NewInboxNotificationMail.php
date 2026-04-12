<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class NewInboxNotificationMail extends Mailable
{
    use Queueable;

    public function __construct(public string $title, public array $lines)
    {
    }

    public function build(): self
    {
        return $this->subject($this->title)->view('emails.inbox-notification');
    }
}
