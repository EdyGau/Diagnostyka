<?php

namespace App\Helpers;

use App\Forms\Builders\ContactFormBuilder;
use App\Forms\ContactFormConfig;

class ContactFormHelper
{
    /**
     * Helper method to create the form builder.
     *
     * @return ContactFormBuilder
     */
    public function createContactFormBuilder(): ContactFormBuilder
    {
        $builder = new ContactFormBuilder(route('contact.submit'));

        foreach (ContactFormConfig::fields() as $field) {
            $builder->addField([
                'type' => $field['type'],
                'name' => $field['name'],
                'label' => $field['label'],
                'required' => $field['required'],
                'validationRules' => $field['validationRules'] ?? [],
                'attributes' => $field['attributes'] ?? []
            ]);
        }

        $builder->setSubmitButton('Wyślij formularz');

        return $builder;
    }
}
