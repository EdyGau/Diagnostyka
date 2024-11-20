<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactFormMail extends Mailable
{
    public array $validatedData;

    public function __construct(array $validatedData)
    {
        $this->validatedData = $validatedData;
    }

    public function build(): ContactFormMail
    {
        return $this->view('emails.contact_form')
            ->with('data', $this->validatedData);
    }
}
