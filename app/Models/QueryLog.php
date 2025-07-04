<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueryLog extends Model
{
    protected $table = 'query_logs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'type', 'causer_id', 'subject_type', 'subject_id', 'subject_detail',
    ];

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'causer_id');
    }
}
