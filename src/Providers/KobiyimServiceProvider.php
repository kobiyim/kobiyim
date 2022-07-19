<?php

namespace Kobiyim\Providers;

use Illuminate\Support\ServiceProvider;

class KobiyimServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'kobiyim');
    }
}
