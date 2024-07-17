<?php

/**
 * Kobiyim
 *
 * @since v1.0.0
 */

namespace App\Http\Controllers\Kobiyim;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function kobiyim(Request $request)
    {
        return view('kobiyim.system.kobiyim');
    }
}
