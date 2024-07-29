<?php

use Illuminate\Support\Facades\Route;

/**
 * Kobiyim
 *
 * @since v1.0.23
 */
use Illuminate\Support\Facades\Http;

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group([
        'middleware' => ['auth'],
    ], function () {

        Route::get('/', 'PagesController@dashboard')->name('dashboard');

        Route::post('modals', 'ModalsController@__invoke')->name('modals');

    });

});