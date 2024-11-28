<?php

/**
 * Kobiyim
 *
 * @version v3.0.0
 *
 */

namespace App\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordResetLinkController extends \Illuminate\Routing\Controller
{
    public function create(Request $request)
    {
        return view('kobiyim.auth.forgot-password');
    }
}
