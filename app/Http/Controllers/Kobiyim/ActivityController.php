<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Http\Controllers\Kobiyim;

use App\Http\Services\Kobiyim\Activity\Json;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        return view('kobiyim.system.activities');
    }

    public function json(Request $request)
    {
        return (new Json)->handle($request);
    }
}
