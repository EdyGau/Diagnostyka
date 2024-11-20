<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ApiContactFormControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test successful submission of the contact form.
     *
     * @return void
     */
    public function testSubmitContactFormSuccessfully()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'description' => 'This is a test message.',
        ];

        $response = $this->postJson('/api/contact', $data);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Form submitted successfully!',
            ]);
    }

    /**
     * Test submission of the contact form with validation error (missing email).
     *
     * @return void
     */
    public function testSubmitContactFormWithValidationError()
    {
        $data = [
            'name' => 'John Doe',
            'description' => 'This is a test message.',
        ];

        $response = $this->postJson('/api/contact', $data);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'success',
                'message',
                'errors' => [
                    'email',
                ],
            ]);
    }

    /**
     * Test submission with blocked email.
     *
     * @return void
     */
    public function testSubmitContactFormWithBlockedEmail()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'bad@example.com',
            'description' => 'This is a test message.',
        ];

        $response = $this->postJson('/api/contact', $data);

        $response->assertStatus(400)
            ->assertJson([
                'success' => false,
                'message' => 'Invalid data in the form.',
            ]);
    }

    /**
     * Test retrieving all contact forms.
     *
     * @return void
     */
    public function testGetAllContactForms()
    {
        $response = $this->getJson('/api/contact');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    '*' => [
                        'name',
                        'email',
                        'description',
                    ],
                ],
            ]);
    }

    /**
     * Test deleting a contact form.
     *
     * @return void
     */
    public function testDeleteContactForm()
    {
        $response = $this->deleteJson('/api/contact/1');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Form deleted successfully!',
            ]);
    }

    /**
     * Test deleting a non-existent contact form.
     *
     * @return void
     */
    public function testDeleteNonExistentContactForm()
    {
        $response = $this->deleteJson('/api/contact/1234');

        $response->assertStatus(404)
            ->assertJson([
                'success' => false,
                'message' => 'Form not found.',
            ]);
    }
}
