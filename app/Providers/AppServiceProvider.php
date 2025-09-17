<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Providers;

use App\Metronic\Init;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('role', function ($role) {
            return auth()->check() && auth()->user()->hasRole($role);
        });

        Blade::if('anyrole', function ($roles) {
            return auth()->check() && auth()->user()->hasAnyRole((array) $roles);
        });

        Blade::if('can', function ($permission) {
            return auth()->check() && auth()->user()->can($permission);
        });
    }
}
