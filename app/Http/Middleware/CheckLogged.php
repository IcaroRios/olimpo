<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogged
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
        if(strstr($request->path(), 'login') || $request->path() == '/'){
            return $next($request);
        }
        if(Auth::check()){
            return $next($request);
        }
        return redirect("/login");
    }
}
