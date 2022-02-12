<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use \Illuminate\Validation\Rules\Password;

class UserPostRequest extends FormRequest
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

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'userName' => 'Login',
            'zipCode' => 'CEP',
            'password' => 'Senha',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'O campo CEP deve ser 8 números',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => 'required',
            'userName' => ['required', 'min:8', Rule::unique('users', 'login')],
            'zipCode' => 'digits:8',
            'email' => ['email', Rule::unique('users', 'email')],
            'password' => [Password::min(8)->numbers()->letters()]
        ];
    }
}
