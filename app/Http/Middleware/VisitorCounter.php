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
            'pages' => (substr(request()->getRequestUri(), 1) !== '')
                ? substr(request()->getRequestUri(), 1) : 'root'
        ]);
        return $next($request);
    }
}