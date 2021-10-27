<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsManager
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
       if(auth()->user()->profil === 'gestion'){
            return $next($request);
        }
   
        return redirect('auth.login')->with('error',"Vous n'avez pas accès à cette partie.");
    }
}
