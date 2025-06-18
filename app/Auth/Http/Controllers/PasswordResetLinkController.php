<?php

namespace App\Auth\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetLinkController extends \Illuminate\Routing\Controller
{
    public function create(Request $request)
    {
        return view('auth.forgot-password');
    }
}
