<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Http\Controllers\Kobiyim;

use App\Http\Services\Kobiyim\Backup\Json;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.backups');
    }

    public function json(Request $request)
    {
        return (new Json)->handle($request);
    }
}
