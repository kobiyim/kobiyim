<?php

/**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'phone',
        'password',
        'is_active',
        'remember_token',
        'remember_expires_at',
    ];

    protected $hidden = [
        'password',
    ];
}
