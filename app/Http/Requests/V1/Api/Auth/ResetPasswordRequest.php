<?php

namespace App\Http\Requests\V1\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:clients,email']
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('validation.required', ['attribute' => __('attributes.email')]),
            'email.email'    => __('validation.email', ['attribute' => __('attributes.email')]),
            'email.exists'   => __('validation.exists', ['attribute' => __('attributes.email')]),
        ];
    }
}
