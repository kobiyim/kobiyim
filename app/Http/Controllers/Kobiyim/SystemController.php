<?php

/**
 * Kobiyim
 *
 * @since v1.0.0
 */

namespace App\Http\Controllers\Kobiyim;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use App\Models\Backup;
use App\Models\User;

class SystemController extends Controller
{
    public function kobiyim(Request $request)
    {
        $data = [
            'islemSayisi' => ActivityLog::count(),
            'kullaniciSayisi' => User::where('is_active', 1)->count(),
        ];

        $files = Backup::where('is_loaded', 1)->get();

        $size = 0;

        foreach($files as $file) {
            $size += Storage::driver('digitalocean')->size($dir);
        }

        $data['yedeklemeBoyutu'] = $size;

        return view('kobiyim.system.kobiyim', $data);
    }
}
