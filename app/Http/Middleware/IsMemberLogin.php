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
        // convert http: to https:
            // $url = url()->current();
            // if (strpos($url, 'http:') !== false) {
            //     $url2 = str_ireplace("http:","https:",$url);
            //     return redirect($url2);
            // }

        if($request->session()->has("client")){
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
