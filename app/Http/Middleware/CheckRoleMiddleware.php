<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRoleMiddleware
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
        if (Auth::user()->checkRole() == 1) 
        {
            return response('admin');
        }
        return $next($request);
    }
}
