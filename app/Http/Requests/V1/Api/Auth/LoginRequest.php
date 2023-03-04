<?php

namespace App\Http\Requests\V1\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'    => ['required', 'string', 'email', 'exists:clients,email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'    => __('validation.required', ['attribute' => __('attributes.email')]),
            'email.string'      => __('validation.string', ['attribute' => __('attributes.email')]),
            'email.email'       => __('validation.email', ['attribute' => __('attributes.email')]),
            'email.exists'      => __('validation.exists', ['attribute' => __('attributes.email')]),
            'password.required' => __('validation.required', ['attribute' => __('attributes.password')]),
            'password.string'   => __('validation.string', ['attribute' => __('attributes.password')]),
        ];
    }
}
