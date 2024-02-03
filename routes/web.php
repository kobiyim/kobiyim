<?php

use Illuminate\Support\Facades\Route;

/**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.1
 */

Route::get('/', 'PagesController@dashboard')->name('dashboard');