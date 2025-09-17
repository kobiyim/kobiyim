<?php

namespace App\Models\Kobiyim;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = 'kobiyim_user_permission';

    protected $fillable = [
        'user_id', 'permission_id',
    ];

    public $timestamps = false;
}
