<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Auth\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {
        return User::create([
            'name'      => $input['name'],
            'phone'     => $input['phone'],
            'password'  => Hash::make($input['password']),
            'type'      => 'user',
            'is_active' => 0,
        ]);
    }
}
