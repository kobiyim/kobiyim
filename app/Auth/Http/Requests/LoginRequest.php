<?php

namespace App\Auth\Http\Requests;

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
            'phone'    => 'required|string|size:16',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'phone.required'    => 'Sisteme giriş için telefon numaranız gerekli.',
            'phone.size'        => 'Telefon numaranızı tam giriniz.',
            'password.required' => 'Şifrenizi giriniz.',
        ];
    }
}
