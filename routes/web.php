<?php

/**
 * Kobiyim
 *
 * @version v3.0.0
 *
 */

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group([
        'middleware' => ['auth'],
    ], function () {

        Route::get('/', 'PagesController@dashboard')->name('dashboard');

        Route::post('modals', 'ModalsController@__invoke')->name('modals');

    });

});