<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminACL
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
        if (Auth::user()->user_type != 'admin') {
            return redirect()->route('login')->with('error', 'UNAUTHORIZED');
        }

        return $next($request);
    }
}
