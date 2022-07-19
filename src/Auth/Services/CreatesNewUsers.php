<?php

namespace Kobiyim\Auth\Services;

use App\Kobiyim\Models\User;
use Illuminate\Support\Facades\Hash;

class CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {
        return User::create([
            'name'     => $input['name'],
            'phone'    => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
