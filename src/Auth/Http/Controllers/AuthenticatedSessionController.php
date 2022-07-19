<?php

namespace Kobiyim\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kobiyim\Auth\Http\Requests\LoginRequest;
use App\Kobiyim\Auth\Services\AttemptToAuthenticate;
use App\Kobiyim\Auth\Services\EnsureLoginIsNotThrottled;
use App\Kobiyim\Auth\Services\PrepareAuthenticatedSession;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function create(Request $request)
    {
        return view('kobiyim::auth.login');
    }

    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            ar([
                'description' => 'Kullanıcı sisteme giriş yaptı.',
                'causer_id'   => Auth::id(),
            ]);

            return redirect()->intended('/');
        });
    }

    protected function loginPipeline(LoginRequest $request)
    {
        return (new Pipeline(app()))->send($request)->through(array_filter([
            EnsureLoginIsNotThrottled::class,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

    public function destroy(Request $request)
    {
        ar([
            'description' => 'Kullanıcı çıkış yaptı.',
            'causer_id'   => Auth::id(),
        ]);

        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended('/');
    }
}
