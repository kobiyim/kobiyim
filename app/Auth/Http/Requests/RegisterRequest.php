<?php

namespace App\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'required|string|min:3|max:255',
            'phone'    => 'required|string|unique:users,phone|size:16',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'phone.required'     => 'Sisteme giriş için telefon numaranız gerekli.',
            'phone.size'         => 'Telefon numaranızı tam giriniz.',
            'phone.unique'       => 'Telefon numaranız sistemde kayıtlı lütfen giriş yapmayı deneyiniz.',
            'password.required'  => 'Şifrenizi giriniz.',
            'password.min'       => 'Şifreniz 8 karakterden uzun olmalıdır.',
            'name.required'      => 'Lütfen adınızı yazınız.',
            'name.min'           => 'Adınız 3 karakterden uzun olmalıdır.',
            'name.max'           => 'Adınız maksimum 255 karakter olmaldır.',
            'password.confirmed' => 'Şifre doğrulamanız uyumsuz.',
        ];
    }
}
