<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        
        // $guard = array_get($exception->guards(),0);

        // switch ($guard) {
        //     case 'cacta':
        //     $login = 'site.inicio';
        //     break;

        //     default:
        //     $login = 'login';
        //     break;
        // }

        if (! $request->expectsJson()) {
            return route('site.inicio');
        }

        
    }
}
