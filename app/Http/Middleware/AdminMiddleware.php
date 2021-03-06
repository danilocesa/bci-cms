<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        dump(Auth::guard($guard)->guest());
        if (Auth::guard($guard)->guest()) {
            
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } 
            // else {
            //     return redirect()->guest('web-admin');
            // }
        }
            
        return $next($request);
    }
}
