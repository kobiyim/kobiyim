<?php

namespace Kobiyim\Auth\Http\Requests;

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
            'name' => [
                'required', 'string', 'max:255',
            ],
            'phone' => [
                'required', 'string', 'unique:users,phone', 'size:16',
            ],
            'password' => [
                'required', 'min:8', 'confirmed',
            ],
        ];
    }
}
