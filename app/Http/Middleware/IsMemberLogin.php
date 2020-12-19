<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsMemberLogin
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
        if($request->session()->has("client")){
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
