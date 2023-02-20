<?php

namespace App\Http\Requests\V1\Api\Client;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\{Media, Phone};

class UpdateClientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'    => ['sometimes', 'string', 'max:80'],
            'email'   => ['sometimes', 'string', 'email', 'max:80', 'unique:clients,email,' . $this->client],
            'address' => ['sometimes', 'string', 'max:255'],
            'avatar'  => ['sometimes', new Media],
            'phone'   => ['sometimes', new Phone],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.string'      => __('validation.string', ['attribute' => __('attributes.name')]),
            'name.max'         => __('validation.max.string', ['attribute' => __('attributes.name'), 'max' => 80]),
            'email.string'     => __('validation.string', ['attribute' => __('attributes.email')]),
            'email.email'      => __('validation.email', ['attribute' => __('attributes.email')]),
            'email.max'        => __('validation.max.string', ['attribute' => __('attributes.email'), 'max' => 80]),
            'email.unique'     => __('validation.unique', ['attribute' => __('attributes.email')]),
            'address.string'   => __('validation.string', ['attribute' => __('attributes.address')]),
            'address.max'      => __('validation.max.string', ['attribute' => __('attributes.address'), 'max' => 255]),
        ];
    }
}
