<?php

namespace App\Http\Requests\V1\Api\Client;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\{Media, Phone};

class StoreClientRequest extends FormRequest
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
            'name'     => ['required', 'string', 'max:80'],
            'email'    => ['required', 'string', 'email', 'max:80', 'unique:clients'],
            'address'  => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'avatar'   => ['required', new Media],
            'phone'    => ['required', new Phone],
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
            'name.required'     => __('validation.required', ['attribute' => __('attributes.name')]),
            'name.string'       => __('validation.string', ['attribute' => __('attributes.name')]),
            'name.max'          => __('validation.max.string', ['attribute' => __('attributes.name'), 'max' => 80]),
            'email.required'    => __('validation.required', ['attribute' => __('attributes.email')]),
            'email.string'      => __('validation.string', ['attribute' => __('attributes.email')]),
            'email.email'       => __('validation.email', ['attribute' => __('attributes.email')]),
            'email.max'         => __('validation.max.string', ['attribute' => __('attributes.email'), 'max' => 80]),
            'email.unique'      => __('validation.unique', ['attribute' => __('attributes.email')]),
            'address.required'  => __('validation.required', ['attribute' => __('attributes.address')]),
            'address.string'    => __('validation.string', ['attribute' => __('attributes.address')]),
            'address.max'       => __('validation.max.string', ['attribute' => __('attributes.address'), 'max' => 255]),
            'password.required' => __('validation.required', ['attribute' => __('attributes.password')]),
            'password.string'   => __('validation.string', ['attribute' => __('attributes.password')]),
            'password.min'      => __('validation.min.string', ['attribute' => __('attributes.password'), 'min' => 8]),
            'avatar.required'   => __('validation.required', ['attribute' => __('attributes.avatar')]),
            'phone.required'    => __('validation.required', ['attribute' => __('attributes.phone')]),
        ];
    }
}
