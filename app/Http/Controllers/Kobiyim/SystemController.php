<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Http\Controllers\Kobiyim;

use App\Models\ActivityLog;
use App\Models\Backup;
use App\Models\User;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function kobiyim(Request $request)
    {
        $data = [
            'islemSayisi'     => ActivityLog::count(),
            'kullaniciSayisi' => User::where('is_active', 1)->count(),
            'yedeklemeBoyutu' => Backup::where('is_loaded', 1)->sum('size'),
        ];

        return view('kobiyim.system.kobiyim', $data);
    }
}
