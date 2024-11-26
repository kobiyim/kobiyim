<?php

/**
 * Kobiyim
 *
 * @version v2.0.0
 */

namespace App\Http\Controllers\Kobiyim;

use Illuminate\Http\Request;
use App\Http\Services\Kobiyim\Activity\Json;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.activities');
    }

    public function json(Request $request)
    {
        return (new Json())->handle($request);
    }
}
