<?php

namespace App\Http\Middleware;

use Closure;

class ClientCreateMiddleware
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
       
         if (\Auth::user()->hasRole(['administrador','coordinador-regional','coodinarod-sucursal'])) {
            return $next($request);
        }else{
            return abort(403);
        }
    }
}
