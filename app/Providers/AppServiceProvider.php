<?php

/**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.22
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
