<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah status bahasa tersimpan dalam sesi
        if ($request->session()->has('locale')) {
            // Memulihkan status bahasa dari sesi
            $locale = $request->session()->get('locale');
        } else {
            // Jika tidak ada status bahasa yang tersimpan, gunakan bahasa default
            $locale = config('app.locale');
        }

        // Atur bahasa aplikasi sesuai dengan nilai yang disimpan
        app()->setLocale($locale);
        return $next($request);
    }
}
