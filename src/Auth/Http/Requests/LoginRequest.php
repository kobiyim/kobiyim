<?php

namespace Kobiyim\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone' => [
                'required', 'nullable', 'string', 'size:16',
            ],
            'password' => [
                'required', 'string',
            ],
        ];
    }

    public function messages()
    {
        return [
            'phone.size'        => 'Telefon numaranızı tam giriniz.',
            'password.required' => 'Şifrenizi giriniz.',
            'passord.string'    => 'Şifrenizi formata uygun giriniz.',
        ];
    }
}
