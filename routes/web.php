<?php

use Illuminate\Support\Facades\Route;

/**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.22
 */

Route::group([
    'middleware'    => [ 'auth' ]
], function() {

    Route::get('/', 'PagesController@dashboard')->name('dashboard');

    Route::post('modals', 'ModalsController@__invoke')->name('modals');

});