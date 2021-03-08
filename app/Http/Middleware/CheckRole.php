<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        /* return $next($request); */
             if (! $request->user()->hasRole($role)){
                 //dd($role);
               return response()->view('errors.401');
            }
            return $next($request);

            /* if (\Auth::user()->hasRole($role)) {

                return $next($request);
            } else {
                return response()->view('errors.401');
            } */
    }
}
