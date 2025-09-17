<?php

namespace App\Models\Kobiyim;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'kobiyim_activity_logs';

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
