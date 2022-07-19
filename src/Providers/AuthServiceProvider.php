<?php

namespace Kobiyim\Providers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(StatefulGuard::class, function () {
            return Auth::guard('web');
        });
    }
}
