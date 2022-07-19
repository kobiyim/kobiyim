<?php

namespace Kobiyim\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_log';

    protected $primaryKey = 'id';

    protected $fillable = [
        'log_name', 'causer_id', 'subject_type', 'subject_id', 'description', 'properties',
    ];

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];
}
