<?php

namespace App\Http\Middleware;

use Closure;
use Carbon;
use Auth;

class LoginMiddleware
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
        $td = Carbon\Carbon::now();

        if ($td->hour >= 23) {
            if (\Auth::user()->hasRole(['coordinador-regional','coordinador-sucursal','ejecutivo-de-credito']))
                {
                    Auth::logout();
                    return abort(503);
                }
                else{
                 return $next($request);
             }
         }
         else
         {
           return $next($request);
       }
   }
}
