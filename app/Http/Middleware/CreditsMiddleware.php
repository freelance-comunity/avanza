<?php

namespace App\Http\Middleware;

use Closure;

class CreditsMiddleware
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
        if (\Auth::user()->hasRole(['ejecutivo-de-credito','coordinador-regional'])) {
            return $next($request);
        }else{
            return abort(403);
        }
    }
}
