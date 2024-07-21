<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login-admin');
    }


    public function handle($request, Closure $next, ...$guards)
    {
        if (!auth()->check()) {
            return redirect()->route('login-admin');
        }

        return $next($request);
    }

}
