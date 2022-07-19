<?php

namespace Kobiyim\Auth\Services;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AttemptToAuthenticate
{
    protected $guard;

    protected $limiter;

    public function __construct(StatefulGuard $guard, LoginRateLimiter $limiter)
    {
        $this->guard = $guard;
        $this->limiter = $limiter;
    }

    public function handle($request, $next)
    {
        if (
            Auth::attempt([
                'phone' => $request->phone,
                'password' => $request->password,
                'is_active' => 1,
            ])
        ) {
            return $next($request);
        }

        $this->throwFailedAuthenticationException($request);
    }

    protected function throwFailedAuthenticationException($request)
    {
        $this->limiter->increment($request);

        throw ValidationException::withMessages([
            'message' => ['Sisteme erişmekte bir sorun yaşanıyor.'],
        ]);
    }
}
