<?php

namespace Kobiyim\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kobiyim\Auth\Http\Requests\RegisterRequest;
use App\Kobiyim\Auth\Services\CreatesNewUsers;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create(Request $request)
    {
        return view('kobiyim::auth.register');
    }

    public function store(RegisterRequest $request, CreatesNewUsers $creator)
    {
        $creator->create($request->all());

        return redirect('/');
    }
}
