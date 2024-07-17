<?php

/**
 * Kobiyim
 *
 * @since v1.0.22
 */

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AliasServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $loader = AliasLoader::getInstance();

        $loader->alias('Metronic', \App\Metronic\Metronic::class);
        $loader->alias('Menu', \App\Metronic\Menu::class);
        $loader->alias('Form', \Spatie\Html\Elements\Form::class);
        $loader->alias('Html', \Spatie\Html\Facades\Html::class);

    }
}
