<?php

namespace App\Http\Middleware;

use Closure;

class Redirect
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
    	return redirect('/blog',301);

 return $next($request);
    }


   
}

