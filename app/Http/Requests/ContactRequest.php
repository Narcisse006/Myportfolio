<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string', 'min:3', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Veuillez indiquer votre nom.',
            'name.min' => 'Le nom doit contenir au moins 2 caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 100 caractères.',
            'email.required' => 'Veuillez indiquer votre adresse email.',
            'email.email' => 'Cette adresse email n\'est pas valide (exemple : prenom@gmail.com).',
            'subject.required' => 'Veuillez indiquer un sujet.',
            'subject.min' => 'Le sujet doit contenir au moins 3 caractères.',
            'subject.max' => 'Le sujet ne peut pas dépasser 150 caractères.',
            'message.required' => 'Veuillez écrire votre message.',
            'message.min' => 'Le message doit contenir au moins 10 caractères.',
            'message.max' => 'Le message ne peut pas dépasser 2000 caractères.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            redirect()
                ->route('home')
                ->withFragment('contact-section')
                ->withInput()
                ->withErrors($validator)
        );
    }
}
