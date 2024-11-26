<?php

/**
 * Kobiyim
 *
 * @version v2.0.0
 */

namespace App\Http\Controllers\Kobiyim;

use Illuminate\Http\Request;
use App\Http\Services\Kobiyim\Backup\Json;

class BackupController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.backups');
    }

    public function json(Request $request)
    {
        return (new Json())->handle($request);
    }
}
