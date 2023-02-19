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
            'email'    => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:4']
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'     => __('validation.required', ['attribute' => __('validation.attributes.email')]),
            'email.string'       => __('validation.string', ['attribute' => __('validation.attributes.email')]),
            'email.email'        => __('validation.email', ['attribute' => __('validation.attributes.email')]),
            'password.required'  => __('validation.required', ['attribute' => __('validation.attributes.password')]),
            'password.string'    => __('validation.string', ['attribute' => __('validation.attributes.password')]),
            'password.min'       => __('validation.min.string', ['attribute' => __('validation.attributes.password'), 'min' => 8]),
        ];
    }
}
