<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCountry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // in this part we define our logic to filter the request.
        // $countries = [

        //     'us' ,
        //     'uk' ,
        //     'ar',
        //     'in'
        // ] ;

        // if(!in_array($request->country,  $countries)&& !request()->is('unavailable')){

        //      return redirect()->route('unavailable');
        // }
        return $next($request);
    }
}
