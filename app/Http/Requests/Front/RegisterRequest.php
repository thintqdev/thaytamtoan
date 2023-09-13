<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|min:6|max:255|unique:users,email',
            'username' => 'required|min:6|max:255|unique:users,username',
            'full_name' => 'required|min:6|max:255',
            'password' => 'required||min:6|max:255|confirmed'
        ];
    }
}
