<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => '\App\Auth\Http\Controllers', 'middleware' => 'guest'], function () {
    // Authentication...
    Route::get('login', 'AuthenticatedSessionController@create')
        ->name('login');

    Route::post('login', 'AuthenticatedSessionController@store');

    Route::get('forgot-password', 'PasswordResetLinkController@create')
        ->name('password.request');

    // Registration...
    Route::get('register', 'RegisteredUserController@create')
        ->name('register');

    Route::post('register', 'RegisteredUserController@store');
});

Route::post('logout', '\App\Auth\Http\Controllers\AuthenticatedSessionController@destroy')
    ->name('logout');

Route::get('system/activities', App\Livewire\System\ActivityComponent::class);
Route::get('system/query-logs', App\Livewire\System\QueryLogComponent::class);
Route::get('system/users', App\Livewire\System\UserComponent::class);
Route::get('system/roles', App\Livewire\System\RoleComponent::class);
Route::get('system/permissions', App\Livewire\System\PermissionComponent::class);
Route::get('system/backups', App\Livewire\System\BackupComponent::class);
