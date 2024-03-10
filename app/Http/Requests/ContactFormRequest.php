<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'number' => 'required|min:10',
            'message' => 'required|min:10|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter enter your name.',
            'email.required' => 'Please enter enter an email address.',
            'email.email' => 'Please enter enter a valid email address.',
            'number.required' => 'Please enter your mobile number.',
            'message.required' => 'Please enter your query.',
        ];
    }
}
