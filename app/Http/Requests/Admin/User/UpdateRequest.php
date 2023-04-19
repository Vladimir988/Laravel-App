<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'This field is required',
            'name.string'       => 'Field should be string',
            'email.required'    => 'This field is required',
            'email.string'      => 'Field should be string',
            'email.email'       => 'Email should be in format: email@email.com',
            'email.unique'      => 'User with this email already exists',
        ];
    }
}
