<?php

namespace App\Http\Middleware;

use Closure;

class XFrame
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Content-Security-Policy', "frame-ancestors 'self' http://127.0.0.1:8000/");
        $response->header('X-Frame-Options', 'ALLOW FROM http://127.0.0.1:8000/');
        return $response;
    }
}