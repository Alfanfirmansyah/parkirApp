<?php

namespace App\Http\Middleware;

use Closure;

class IsOperator
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
        if (auth()->check() && $request->user()->id_role == '1'){
			return redirect()->guest('/admin');
		}
        return $next($request);
    }
}
