<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle(Request $request, Closure $next): Response
{
     \Log::info('Middleware hit!', [
        'session' => $request->session()->all(),
        'url' => $request->url()
    ]);


    if (!$request->session()->has('logged_in')) {
            return redirect('/recipes')->with('error', 'Please login first!');
        }

    return $next($request);
}
}
