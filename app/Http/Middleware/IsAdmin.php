<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       if(auth()->user()->profil === 'admin'){
            return $next($request);
        }
   
        return redirect('auth.login')->with('error',"Vous n'avez pas accès à cette partie.");
    }
}
