<?php

namespace Kobiyim\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'key',
    ];

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];
}
