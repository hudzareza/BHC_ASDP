<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XFrameHeadersMiddleware
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
        // return $next($request);
        $response = $next($request);
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        return $response;
    }
}
