<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRole
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
        $user = Auth::user();

        if (!$user->isAdmin()){
            redirect(404);
        }
        //checks for  admin
        return $next($request);

    }
}
