<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
         if (\Auth::user()->hasRole(['administrador'])) {
            return $next($request);
        }else{
            return abort(403);
        }
        
    }
}
