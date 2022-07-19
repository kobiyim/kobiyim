<?php

namespace Kobiyim\Auth\Services;

use App\Kobiyim\Auth\Rules\Password;

trait PasswordValidationRules
{
    protected function passwordRules()
    {
        return ['required', 'string', new Password];
    }
}
