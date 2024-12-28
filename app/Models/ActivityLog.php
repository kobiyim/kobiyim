<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'log_name', 'causer_id', 'subject_type', 'subject_id', 'description', 'properties',
    ];

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'causer_id');
    }
}
