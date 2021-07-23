<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequestCounterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $requestCount = session('request_count', 0);

        session([
            'request_count' => $requestCount + 1
        ]);

        return $next($request);
    }
}
