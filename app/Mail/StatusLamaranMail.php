<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusLamaranMail extends Mailable
{
    use Queueable, SerializesModels;

    public $applicantName;
    public $jobTitle;
    public $companyName;
    public $status;
    public $applicationLink;

    public function __construct($applicantName, $jobTitle, $companyName, $status, $applicationLink)
    {
        $this->applicantName = $applicantName;
        $this->jobTitle = $jobTitle;
        $this->companyName = $companyName;
        $this->status = $status;
        $this->applicationLink = $applicationLink;
    }

    public function build()
    {
        return $this->markdown('emails.status-lamaran')
            ->subject('Status Lamaran Anda: ' . ucfirst($this->status));
    }
}
