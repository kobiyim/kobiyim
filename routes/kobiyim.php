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
Route::get('system/backups', App\Livewire\System\BackupComponent::class);

Route::get('system/users', App\Livewire\System\User\UserComponent::class);
Route::get('system/user/create', App\Livewire\System\User\Create::class);
Route::get('system/user/{id}/edit', App\Livewire\System\User\Edit::class);

Route::get('system/roles', App\Livewire\System\Role\RoleComponent::class);
Route::get('system/role/create', App\Livewire\System\Role\Create::class);
Route::get('system/role/{id}/edit', App\Livewire\System\Role\Edit::class);

Route::get('system/permissions', App\Livewire\System\Permission\PermissionComponent::class);
Route::get('system/permission/create', App\Livewire\System\Permission\Create::class);
Route::get('system/permission/{id}/edit', App\Livewire\System\Permission\Edit::class);

