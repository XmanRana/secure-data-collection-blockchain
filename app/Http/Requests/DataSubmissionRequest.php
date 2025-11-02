<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataSubmissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'full_name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/',
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
            ],
            'phone' => [
                'required',
                'regex:/^[0-9]{10}$/',
            ],
            'address' => [
                'required',
                'string',
                'min:10',
                'max:500',
            ],
            'document' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120', // 5MB
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Full name is required.',
            'full_name.regex' => 'Name can only contain letters and spaces.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Phone must be exactly 10 digits.',
            'address.required' => 'Address is required.',
            'address.min' => 'Address must be at least 10 characters.',
            'document.required' => 'Please upload a document.',
            'document.mimes' => 'Document must be PDF, JPG, or PNG.',
            'document.max' => 'Document size cannot exceed 5MB.',
        ];
    }
}
