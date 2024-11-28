<?php

/**
 * Kobiyim
 *
 * @version v3.0.0
 *
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
            'yedeklemeBoyutu' => Backup::where('is_loaded', 1)->sum('size'),
        ];

        return view('kobiyim.system.kobiyim', $data);
    }
}
