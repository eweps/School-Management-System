<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCaMarkFillingIsOpen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (getSetting('FILL_CA_MARKS') !== '1') {
            return redirect()->back()->with('error', 'Filling CA marks is currently disabled.');
        }


        return $next($request);
    }
}
