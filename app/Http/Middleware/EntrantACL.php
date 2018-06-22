<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class EntrantACL
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
        if (Auth::user()->user_type != 'entrant') {
            return redirect()->route('login')->with('error', 'UNAUTHORIZED');
        }

        return $next($request);
    }
}
