<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'  => 'required|string',
            'email' => 'required|string|email|unique:users',
            'role'  => 'required|integer',
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
            'role.required'     => 'This field is required',
            'role.integer'      => 'Field should be integer',
        ];
    }
}
