<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecureHeaders
{

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->header('Strict-Transport-Security', 'max-age=31536000; includeSubdomains');
        $response->header('X-Content-Type-Options', 'nosniff');
        $response->header('X-XSS-Protection', '1; mode=block');
        $response->header('X-Frame-Options', 'SAMEORIGIN', false);
        $response->header('Referrer-Policy', 'origin');

        return $response;
    }

}