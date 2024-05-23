<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($locale = $request->get('locale')) {
            App::setLocale($locale);
            cookie()->queue('locale', $locale, 60 * 24 * 30); // 30 días
        } elseif ($locale = $request->cookie('locale')) {
            App::setLocale($locale);
        } elseif ($request->user()) {
            $locale = $request->user()->locale;
            App::setLocale($locale);
        }

        return $next($request);
    }
}
