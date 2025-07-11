<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    protected $table = 'backups';

    protected $primaryKey = 'id';

    protected $fillable = [
        'filename', 'dir', 'type', 'size', 'is_loaded',
    ];

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];
}
