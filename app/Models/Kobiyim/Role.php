<?php

namespace App\Models\Kobiyim;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'kobiyim_user_permission';

    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
