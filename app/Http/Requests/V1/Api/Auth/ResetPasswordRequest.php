<?php

namespace App\Http\Requests\V1\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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

    public function messages()
    {
        return [
            'email.required' => __('validation.required', ['attribute' => __('validation.attributes.email')]),
            'email.email'    => __('validation.email', ['attribute' => __('validation.attributes.email')]),
            'email.exists'   => __('validation.exists', ['attribute' => __('validation.attributes.email')]),
        ];
    }
}
