<?php

namespace App\Mail;

use App\Models\ContactEntity;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $contactEntity = null;
    /**
     * Create a new message instance.
     *
     * @param $subject
     * @param $data array|string
     * @param string $view
     */
    public function __construct(ContactEntity $contactEntity)
    {
        $this->contactEntity = $contactEntity;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Contact Email Notification - ' . $this->contactEntity->id);

        $this->to('support@liquidfish.com');

        $this->view('emails.contact-notification', ['contactEntity' => $this->contactEntity]);

        return $this;
    }
}
