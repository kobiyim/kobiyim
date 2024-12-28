<?php

/**
 * Kobiyim
 *
 * @version v3.0.9
 */

namespace App\Auth\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetLinkController extends \Illuminate\Routing\Controller
{
    public function create(Request $request)
    {
        return view('kobiyim.auth.forgot-password');
    }
}
