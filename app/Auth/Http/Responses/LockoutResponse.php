<?php

namespace App\Auth\Http\Responses;

use App\Auth\Services\LoginRateLimiter;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class LockoutResponse implements Responsable
{
    protected $limiter;

    public function __construct(LoginRateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function toResponse($request)
    {
        return with($this->limiter->availableIn($request), function ($seconds) {
            throw ValidationException::withMessages([
                'phone' => 'Çok fazla giriş denemesi yaptınız.\nGiriş denemeleriniz engellendi. '.$seconds,
            ])->status(Response::HTTP_TOO_MANY_REQUESTS);
        });
    }
}
