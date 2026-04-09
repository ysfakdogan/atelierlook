<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CampaignMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->data['title'] ?? 'Kampanya'
        );
    }

    public function content(): Content
    {
        $trackingUrl = "https://deftly-uncoined-tenisha.ngrok-free.dev/mail/open/" . $this->data['log_id'];

        return new Content(
            view: 'emails.campaign',
            with: [
                'data' => $this->data,
                'trackingUrl' => $trackingUrl
            ]
        );
    }

    /**
     * 🔥 INLINE IMAGE (CID GERÇEK ÇÖZÜM)
     */
    public function build()
    {
        return $this->view('emails.campaign')
            ->with([
                'data' => $this->data,
                'trackingUrl' => "https://deftly-uncoined-tenisha.ngrok-free.dev/mail/open/" . $this->data['log_id']
            ])
            ->withSymfonyMessage(function ($message) {
                $message->embedFromPath(
                    storage_path('app/public/banner.jpg'),
                    'banner'
                );
            });
    }
}
