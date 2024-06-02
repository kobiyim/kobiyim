<?php

/**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.22
 */

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
