<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockJaneDoeRequest
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
        if (mb_strtolower($request->user()->name) === 'jane doe') {
            return abort(401, 'You are not allowed to do this :/');
        }

        return $next($request);
    }
}
