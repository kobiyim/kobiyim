<?php

/**
 * Kobiyim
 *
 * @version v4.0.0
 *
 */

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth'],
    'namespace' => '\App\Http\Controllers\Kobiyim',
], function () {
    Route::get('kobiyim', 'SystemController@kobiyim')->name('kobiyim');

    Route::group([
        'prefix' => 'system',
    ], function () {
        Route::group([
            'prefix' => 'activity',
        ], function () {
            Route::get('/', 'ActivityController@index')->name('system.activity');
            Route::get('json', 'ActivityController@json')->name('system.activity.json');
        });

        Route::group([
            'prefix' => 'querylog',
        ], function () {
            Route::get('/', 'QueryLogController@index')->name('system.querylog');
            Route::get('json', 'QueryLogController@json')->name('system.querylog.json');
        });

        Route::group([
            'prefix' => 'backup',
        ], function () {
            Route::get('/', 'BackupController@index')->name('system.backup');
            Route::get('json', 'BackupController@json')->name('system.backup.json');
        });

        Route::get('user/json', 'UserController@json')->name('system.user.json');

        Route::get('user/{id}/permission', 'UserController@permission')->name('system.user.permission');
        Route::post('user/{id}/permission', 'UserController@savePermission');

        Route::group([
            'prefix' => 'user',
        ], function () {
            Route::get('/', 'UserController@index')->name('system.user.index');
            Route::get('json', 'UserController@json')->name('system.user.json');
            Route::post('/', 'UserController@store')->name('system.user.store');
            Route::put('{id}', 'UserController@update')->name('system.user.update');
            Route::delete('{id}', 'UserController@destroy')->name('system.user.destroy');
        });

        Route::group([
            'prefix' => 'permission',
        ], function () {
            Route::get('/', 'PermissionController@index')->name('system.permission.index');
            Route::get('json', 'PermissionController@json')->name('system.permission.json');
            Route::post('/', 'PermissionController@store')->name('system.permission.store');
            Route::put('{id}', 'PermissionController@update')->name('system.permission.update');
            Route::delete('{id}', 'PermissionController@destroy')->name('system.permission.destroy');
        });
    });

    Route::post('kobiyim.modals', 'KobiyimModalsController@__invoke')->name('kobiyim.modals');
});

Route::group(['namespace' => '\App\Auth\Http\Controllers'], function () {
    // Authentication...
    Route::get('login', 'AuthenticatedSessionController@create')
        ->middleware(['guest'])
        ->name('login');

    Route::post('login', 'AuthenticatedSessionController@store')
        ->middleware([
            'guest',
        ]);

    Route::post('logout', 'AuthenticatedSessionController@destroy')
        ->name('logout');

    Route::get('forgot-password', 'PasswordResetLinkController@create')
        ->middleware('guest')
        ->name('password.request');

    // Registration...
    Route::get('register', 'RegisteredUserController@create')
        ->middleware('guest')
        ->name('register');

    Route::post('register', 'RegisteredUserController@store')
        ->middleware('guest');
});
