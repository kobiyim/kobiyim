<?php

/**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
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
            'name' => $input['name'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
