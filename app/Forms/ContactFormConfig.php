<?php

namespace App\Forms;

class ContactFormConfig
{
    /**
     * Define the fields of the contact form.
     *
     * @return array
     */
    public static function fields(): array
    {
        return [
            [
                'type' => 'text',
                'name' => 'name',
                'label' => 'Imię',
                'required' => true,
                'validationRules' => ['required', 'string', 'min:3', 'max:50'],
                'attributes' => ['placeholder' => 'Enter your name']
            ],
            [
                'type' => 'email',
                'name' => 'email',
                'label' => 'Email',
                'required' => true,
                'validationRules' => ['required', 'email'],
                'attributes' => ['placeholder' => 'Enter your email']
            ],
            [
                'type' => 'textarea',
                'name' => 'description',
                'label' => 'Opis',
                'required' => false,
                'validationRules' => ['nullable', 'string', 'max:500'],
                'attributes' => ['placeholder' => 'Describe your message']
            ],
        ];
    }
}
