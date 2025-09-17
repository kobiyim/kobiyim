<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Http\Controllers\Kobiyim;

use App\Http\Services\Kobiyim\QueryLog\Json;
use Illuminate\Http\Request;

class QueryLogController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.querylogs.index');
    }

    public function json(Request $request)
    {
        return (new Json)->handle($request);
    }
}
