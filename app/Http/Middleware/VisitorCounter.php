<?php

namespace App\Http\Middleware;

use App\Model\Counter;
use Closure;

class VisitorCounter
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
        Counter::create([
            'status' => 1,
            'pages' => request()->getRequestUri()
        ]);
        return $next($request);
    }
}