<?php

namespace App\Http\Middleware;

use Closure;

class UserRole
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
        // gets logued user
//        $user = Auth::user();
//
//        if ($user->isAdmin()){
//            redirect(404);
//        }
        //checks for  admin
        return $next($request);


    }
}
