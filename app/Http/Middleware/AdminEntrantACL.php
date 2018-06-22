<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminEntrantACL
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
        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'entrant') {
            return $next($request);
        } else {
            return redirect()->route('login')->with('error', 'UNAUTHORIZED');
        }
    }
}
