<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'email' => 'required|email',
        'password' => 'required',
        'name' => 'required| min:5',
        'image' => 'required'
    ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name Is Required',
            'email.min' => 'Name Must Be At Least 5 Char',
            'image.required' => 'Image Is Required',
            'email.required' => 'Email Is Required',
            'email.email' => 'Invalid Email.',
            'password.required' => 'Password Is Required'

        ];
    }
}
