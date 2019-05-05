<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
		if (auth()->check() && $request->user()->role_id == '2'){
			return redirect()->guest('/operator');
		}
        return $next($request);
    }
}
