<?php

namespace App\Http\Middleware;

use Closure;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SetTimeZone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            
            $timezone = Auth::user()->timezone ?? config('app.timezone', 'UTC');
            
            if (in_array($timezone, DateTimeZone::listIdentifiers())) {
                config(['app.timezone' => $timezone]);
                date_default_timezone_set($timezone);
            }
        }
        return $next($request);
    }
}
