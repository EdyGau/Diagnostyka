<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function testContactForm()
    {
        $response = $this->postJson('/api/contact', [
            'name' => 'Xx',
            'email' => 'xxx',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email']);
    }

    public function test_contact_form_passes_with_valid_data()
    {
        $response = $this->postJson('/api/contact', [
            'name' => 'Testy Test',
            'email' => 'test@test.com',
            'description' => 'Lorem ipsum',
        ]);

        $response->assertStatus(200)
            ->assertJson(['success' => true]);
    }
}
