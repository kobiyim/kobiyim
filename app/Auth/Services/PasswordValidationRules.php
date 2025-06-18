<?php

namespace App\Auth\Services;

use App\Auth\Rules\Password;

trait PasswordValidationRules
{
    protected function passwordRules()
    {
        return ['required', 'string', new Password];
    }
}
