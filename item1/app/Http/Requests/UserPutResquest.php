<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserPutResquest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'userName' => ['required', 'min:8', Rule::unique('users', 'login')->ignore($this->user)],
            'zipCode' => 'digits:8',
            'email' => ['email', Rule::unique('users', 'email')->ignore($this->user)],
        ];
    }
}
