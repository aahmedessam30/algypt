<?php

namespace App\Http\Requests\V1\Api\Client;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\{Media, Phone};

class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => ['sometimes', 'string', 'max:80'],
            'email'   => ['sometimes', 'string', 'email', 'max:80', "unique:clients,email,$this->client,id"],
            'address' => ['sometimes', 'string', 'max:255'],
            'avatar'  => ['sometimes', new Media],
            'phone'   => ['sometimes', new Phone],
        ];
    }

    public function messages(): array
    {
        return [
            'name.string'    => __('validation.string', ['attribute' => __('attributes.name')]),
            'name.max'       => __('validation.max.string', ['attribute' => __('attributes.name'), 'max' => 80]),
            'email.string'   => __('validation.string', ['attribute' => __('attributes.email')]),
            'email.email'    => __('validation.email', ['attribute' => __('attributes.email')]),
            'email.max'      => __('validation.max.string', ['attribute' => __('attributes.email'), 'max' => 80]),
            'email.unique'   => __('validation.unique', ['attribute' => __('attributes.email')]),
            'address.string' => __('validation.string', ['attribute' => __('attributes.address')]),
            'address.max'    => __('validation.max.string', ['attribute' => __('attributes.address'), 'max' => 255]),
        ];
    }
}
