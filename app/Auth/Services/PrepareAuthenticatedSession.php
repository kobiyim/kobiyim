<?php

/**
 * Kobiyim
 *
 * @version v2.0.0
 */

namespace App\Auth\Services;

class PrepareAuthenticatedSession
{
    protected $limiter;

    public function __construct(LoginRateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function handle($request, $next)
    {
        $request->session()->regenerate();

        $this->limiter->clear($request);

        return $next($request);
    }
}
