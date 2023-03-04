<?php

namespace App\Http\Requests\V1\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'      => __('validation.required', ['attribute' => __('validation.attributes.name')]),
            'name.string'        => __('validation.string', ['attribute' => __('validation.attributes.name')]),
            'name.max'           => __('validation.max.string', ['attribute' => __('validation.attributes.name'), 'max' => 100]),
            'email.required'     => __('validation.required', ['attribute' => __('validation.attributes.email')]),
            'email.string'       => __('validation.string', ['attribute' => __('validation.attributes.email')]),
            'email.email'        => __('validation.email', ['attribute' => __('validation.attributes.email')]),
            'email.max'          => __('validation.max.string', ['attribute' => __('validation.attributes.email'), 'max' => 255]),
            'email.unique'       => __('validation.unique', ['attribute' => __('validation.attributes.email')]),
            'password.required'  => __('validation.required', ['attribute' => __('validation.attributes.password')]),
            'password.string'    => __('validation.string', ['attribute' => __('validation.attributes.password')]),
            'password.min'       => __('validation.min.string', ['attribute' => __('validation.attributes.password'), 'min' => 8]),
            'password.confirmed' => __('validation.confirmed', ['attribute' => __('validation.attributes.password')]),
        ];
    }
}
