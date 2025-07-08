<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'key',
    ];

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];

}
