<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Livewire'], function () {

    Route::group([
        'middleware' => ['auth'],
    ], function () {

        Route::get('/', Dashboard::class)->name('dashboard');

    });

});