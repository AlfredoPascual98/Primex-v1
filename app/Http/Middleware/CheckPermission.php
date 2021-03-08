<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckPermission
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


        /* if (\Auth::user()->can($permission)) {

            return $next($request);
        } else {
            return response()-> view('errors.401'); 
        } */
        //dd($request->user()->hasRole('3'));
        /* if ($request->user()->hasRole($role)){
            return $next($request);
        }else{
            abort(403, "No autorizado");
         } */

        $roles_ar = explode('|', $role); 
        //dd($role);
        foreach($roles_ar as $role){
            //dd($request->user()->hasRole($role));
            //dd(user()->hasRole($role));
            if ($request->user()->hasRole($role)){
                return $next($request);
            }else{
                return response()-> view('errors.401'); 
            }
    } 
}

}