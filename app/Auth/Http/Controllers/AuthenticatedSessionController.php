<?php

/**
 * Kobiyim
 *
 * @since v1.0.22
 */

namespace App\Auth\Http\Controllers;

use App\Auth\Http\Requests\LoginRequest;
use App\Auth\Services\AttemptToAuthenticate;
use App\Auth\Services\EnsureLoginIsNotThrottled;
use App\Auth\Services\PrepareAuthenticatedSession;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends \Illuminate\Routing\Controller
{
    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function create(Request $request)
    {
        return view('kobiyim.auth.login');
    }

    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            activityRecord([
                'description' => 'Kullanıcı sisteme giriş yaptı.',
                'subject_type'  => 'Session',
                'subject_id'    => Auth::id(),
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
        activityRecord([
            'description' => 'Kullanıcı çıkış yaptı.',
            'subject_type' => 'Session',
            'subject_id' => Auth::id(),
            'causer_id' => Auth::id(),
        ]);

        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with(['message' => 'Çıkış işleminiz gerçekleşti. İyi günler dileriz.']);
    }
}
