<?php

/**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.22
 */

use Illuminate\Support\Str;

use App\Models\ActivityLog;
use App\Models\Permission;
use App\Models\UserPermission;

if(!function_exists('activityRecord')) {
    function activityRecord($values, $log_name = 'default')
    {
        //'log_name', 'causer_id', 'subject_type', 'subject_id', 'description'
        $values = Arr::add($values, 'log_name', $log_name);
        $values = Arr::add($values, 'causer_id', ((Auth::check()) ? Auth::id() : (isset($values['causer_id']) ? $values['causer_id'] : null)));

        return ActivityLog::create($values);
    }
}

if(!function_exists('connectToKobiyim')) {
    function connectToKobiyim()
    {
        
    }
}

if (! function_exists('day')) {
    function day($which = null)
    {
        $days = collect([
            1 => 'Pazartesi',
            2 => 'Salı',
            3 => 'Çarşamba',
            4 => 'Perşembe',
            5 => 'Cuma',
            6 => 'Cumartesi',
            7 => 'Pazar',
        ]);

        return ($which == null) ? $days : $days[$which];
    }
}

if (! function_exists('month')) {
    function month($which = null)
    {
        $months = collect([
            1  => 'Ocak',
            2  => 'Şubat',
            3  => 'Mart',
            4  => 'Nisan',
            5  => 'Mayıs',
            6  => 'Haziran',
            7  => 'Temmuz',
            8  => 'Ağustos',
            9  => 'Eylül',
            10 => 'Ekim',
            11 => 'Kasım',
            12 => 'Aralık',
        ]);

        return ($which == null) ? $months : $months[$which];
    }
}

if (! function_exists('can')) {
    function can($permissionKey)
    {
        if(Auth::check()) {
            if(Auth::user()->type == 'admin') {
                return true;
            } else {
                if(
                    Permission::where('key', $permissionKey)->first() != null
                        AND
                    UserPermission::where('user_id', Auth::id())->where('permission_id', Permission::where('key', $permissionKey)->first()->id)->first() != null
                ) {
                    return true;
                }
            }
        }

        return false;
    }
}