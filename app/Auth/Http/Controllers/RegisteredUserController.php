<?php

/**
 * Kobiyim
 *
 * @since v1.0.22
 */

namespace App\Auth\Http\Controllers;

use App\Auth\Http\Requests\RegisterRequest;
use App\Auth\Services\CreatesNewUsers;
use Illuminate\Http\Request;

class RegisteredUserController extends \Illuminate\Routing\Controller
{
    public function create(Request $request)
    {
        return view('kobiyim.auth.register');
    }

    public function store(RegisterRequest $request, CreatesNewUsers $creator)
    {
        $creator->create($request->all());

        return redirect()->route('dashboard');
    }
}
