<?php

namespace App\Http\Middleware;

use Closure;

class EnsureAcceptsJson
{
    public function handle($request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');
        return $next($request);
    }
}
