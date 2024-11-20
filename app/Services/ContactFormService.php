<?php

namespace App\Services;

use App\Mail\ContactFormMail;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class ContactFormService
{
    /**
     * Process the form submission data.
     *
     * @param array $validatedData
     * @return void
     */
    public function processFormSubmission(array $validatedData): void
    {
        $this->saveMessage($validatedData);
        $this->sendEmail($validatedData);
    }

    /**
     * Save the contact message to the database.
     *
     * @param array $validatedData
     * @return void
     */
    protected function saveMessage(array $validatedData): void
    {
        Message::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'message' => $validatedData['message'],
        ]);
    }

    /**
     * Send the contact message via email.
     *
     * @param array $validatedData
     * @return void
     */
    protected function sendEmail(array $validatedData): void
    {
        Mail::to('test@testyy.com')->send(new ContactFormMail($validatedData));
    }
}
