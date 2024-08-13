<?php

/**
 * Kobiyim
 *
 * @version v2.0.0
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Metronic\Init;

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
