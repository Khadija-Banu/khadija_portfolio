<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
// use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mime\Address;

class ContactFromMail extends Mailable
{
    use Queueable, SerializesModels;


    public $contact_form_data;

    /**
     * Create a new message instance.
     */
    public function __construct($contact_form_data)
    {
        $this->contact_form_data = $contact_form_data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact From Mail',
            from: new Address('yourmail@gmail.com','Portfolio'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'contact.contact-form',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
