<?php

/**
 * Kobiyim
 *
 * @version v2.0.0
 */

namespace App\Http\Controllers\Kobiyim;

use App\Models\QueryLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Services\Kobiyim\QueryLog\Json;

class QueryLogController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.querylogs.index');
    }

    public function json(Request $request)
    {
        return (new Json())->handle($request);
    }
}
