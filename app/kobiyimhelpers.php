<?php

/**
 * Kobiyim
 *
 * @version v3.0.11
 */

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

if (! function_exists('vKobiyim')) {
    function vKobiyim()
    {
        return json_decode(connectToKobiyim('https://api.kobiyim.com/get-latest-kobiyim-framework'))->version;
    }
}

if (! function_exists('checkConnectionToKobiyim')) {
    function checkConnectionToKobiyim()
    {
        return connectToKobiyim('https://api.kobiyim.com/check-connection');
    }
}

if (! function_exists('saveActivity')) {
    function saveActivity($inputs)
    {
        return connectToKobiyim('https://api.kobiyim.com/save-activity', $inputs);
    }
}

if (! function_exists('saveBackupStatus')) {
    function saveBackupStatus($inputs)
    {
        return connectToKobiyim('https://api.kobiyim.com/save-backup-status', $inputs);
    }
}

if (! function_exists('saveLog')) {
    function saveLog($inputs)
    {
        return connectToKobiyim('https://api.kobiyim.com/save-log', $inputs);
    }
}

if (! function_exists('updates')) {
    function updates()
    {
        return connectToKobiyim('https://api.kobiyim.com/updates');
    }
}

if (! function_exists('kobiyimUpdates')) {
    function kobiyimUpdates()
    {
        return connectToKobiyim('https://api.kobiyim.com/kobiyim-updates');
    }
}

if (! function_exists('vLaravel')) {
    function vLaravel()
    {
        return json_decode(connectToKobiyim('https://api.kobiyim.com/get-latest-laravel-framework'))->version;
    }
}

if (! function_exists('connectToKobiyim')) {
    function connectToKobiyim($url, $inputs = [])
    {
        return Http::post($url, array_merge([
            'username'   => env('KOBIYIM_USERNAME'),
            'app_secret' => env('KOBIYIM_SECRET'),
            'app_key'    => env('KOBIYIM_KEY'),
        ], $inputs));
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
        if (Auth::check()) {
            if (Auth::user()->type == 'admin') {
                return true;
            } else {
                if (
                    Permission::where('key', $permissionKey)->first() != null
                    and UserPermission::where('user_id', Auth::id())->where('permission_id', Permission::where('key', $permissionKey)->first()->id)->first() != null
                ) {
                    return true;
                }
            }
        }

        return false;
    }
}

if (! function_exists('arrangeErrors')) {
    function arrangeErrors($errors)
    {
        $data = [];

        foreach ($errors as $key => $errorDetails) {
            $data[] = [
                'key'     => $key,
                'message' => implode(' ', $errorDetails),
            ];
        }

        return $data;
    }
}

if (! function_exists('formatBytes')) {
    function formatBytes($size)
    {
        if ($size == 0) {
            return 0;
        }

        $base = log($size) / log(1024);
        $suffix = ['', 'KB', 'MB', 'GB', 'TB'];
        $f_base = floor($base);

        return round(pow(1024, $base - floor($base)), 2).' '.$suffix[$f_base];
    }
}

if (! function_exists('systemMenu')) {
    function systemMenu()
    {
        return [
            [
                'title'   => 'Sistem',
                'root'    => true,
                'toggle'  => 'click',
                'can'     => 'system-menusu',
                'submenu' => [
                    'type'      => 'classic',
                    'alignment' => 'left',
                    'items'     => [
                        [
                            'title'       => 'Aktiviteler',
                            'root'        => true,
                            'page'        => 'system/activity',
                            'whereActive' => 'system/activity',
                        ],
                        [
                            'title'       => 'Sorgu Takibi',
                            'page'        => 'system/querylogs',
                            'whereActive' => 'system/querylogs',
                        ],
                        [
                            'title'       => 'Kullanıcılar',
                            'page'        => 'system/user',
                            'whereActive' => 'system/user',
                        ],
                        [
                            'title'       => 'İzinler',
                            'page'        => 'system/permission',
                            'whereActive' => 'system/permission',
                        ],
                        [
                            'title'       => 'Yedeklemeler',
                            'page'        => 'system/backup',
                            'whereActive' => 'system/backup',
                        ],
                    ],
                ],
            ],
        ];
    }
}
