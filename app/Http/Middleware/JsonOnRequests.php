<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

final class JsonOnRequests
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
        // Set header.
        $request->headers->set('Accept', 'application/json');

        // Push request.
        return $next($request);
    }
}