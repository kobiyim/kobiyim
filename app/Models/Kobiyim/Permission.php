<?php

namespace App\Models\Kobiyim;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'kobiyim_user_permission';

    protected $fillable = ['name'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_permission');
    }
}