<?php

use App\Models\ActivityLog;
use App\Models\Permission;
use App\Models\UserPermission;
use Illuminate\Support\Facades\Http;

if (! function_exists('activityRecord')) {
    function activityRecord($values, $log_name = 'default')
    {
        // 'log_name', 'causer_id', 'subject_type', 'subject_id', 'description'
        $values = Arr::add($values, 'log_name', $log_name);
        $values = Arr::add($values, 'causer_id', (Auth::check()) ? Auth::id() : (isset($values['causer_id']) ? $values['causer_id'] : null));

        return ActivityLog::create($values);
    }
}