<?php

use App\Kobiyim\Models\ActivityLog;
use App\Kobiyim\Models\Permission;
use App\Kobiyim\Models\UserPermission;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

if (! function_exists('newCurlHttp')) {
    function newCurlHttp($url, $values)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, count($values));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $values);

        $getValues = curl_exec($ch);

        curl_close($ch);

        return $getValues;
    }
}

if (! function_exists('can')) {
    function can($permissionKey)
    {
        return
            Auth::check()
            &&
            Permission::where('key', $permissionKey)->first() != null
            &&
            UserPermission::where('user_id', Auth::id())->where('permission_id', Permission::where('key', $permissionKey)->first()->id)->first() != null;
    }
}

if (! function_exists('ar')) {
    function ar($values, $log_name = 'default')
    {
        //'log_name', 'causer_id', 'subject_type', 'subject_id', 'description', 'properties'
        $values = Arr::add($values, 'log_name', $log_name);
        $values = Arr::add($values, 'causer_id', ((Auth::check()) ? Auth::id() : (isset($values['causer_id']) ? $values['causer_id'] : null)));

        return ActivityLog::create($values);
    }
}

if (! function_exists('connectToKobiyim')) {
    function connectToKobiyim($values)
    {
        $params = [
            'username'   => env('KOBIYIMUSERNAME'),
            'app_secret' => env('KOBIYIMAPPSECRET'),
            'app_key'    => env('KOBIYIMAPPKEY'),
        ];

        return newCurlHttp('https://api.kobiyim.com/jobber', array_merge($params, $values));
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

if (! function_exists('sendSms')) {
    /**
     * SMS yollamaya yarayan fonksiyondur
     *
     * @param  string|array  $numbers sms yollanacak numara/numaralar
     * @param  string  $message yollanacak mesaj
     * @return void
     */
    function sendSms($numbers, $message)
    {
    }
}
