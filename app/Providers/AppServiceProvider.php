<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Providers;

use App\Metronic\Init;
use Illuminate\Support\ServiceProvider;

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
        Init::run();
    }
}
