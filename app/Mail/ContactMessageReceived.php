<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $contactMessage)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New contact message: '.$this->contactMessage->subject,
            replyTo: [
                new Address(
                    $this->contactMessage->email,
                    $this->contactMessage->name
                ),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact-message-received',
            with: [
                'messageRecord' => $this->contactMessage,
                'adminUrl' => route('admin.messages.show', $this->contactMessage),
            ],
        );
    }
}
