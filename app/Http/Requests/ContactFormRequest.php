<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email',
            'description' => 'nullable|string|max:500',
        ];
    }

    /**
     * Custom error messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Pole "Imię" jest wymagane.',
            'name.min' => 'Pole "Imię" musi mieć co najmniej 3 znaki.',
            'name.max' => 'Pole "Imię" może mieć maksymalnie 50 znaków.',
            'email.required' => 'Pole "Email" jest wymagane.',
            'email.email' => 'Podaj poprawny adres email.',
            'description.max' => 'Pole "Opis" może mieć maksymalnie 500 znaków.',
        ];
    }
}
