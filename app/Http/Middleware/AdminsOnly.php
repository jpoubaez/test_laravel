<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminsOnly
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

        //ddd(auth()->user());
        if (auth()->user()) {
            if (auth()->user()->username != 'jpoubaez') {
                abort(403);
            }
        }
        else {
            abort(403);
        }

        return $next($request);
    }
}
