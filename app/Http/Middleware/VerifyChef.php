<?php

namespace App\Http\Middleware;

use Closure;

class VerifyChef
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
        if(!auth()->user()->isChef())
        {
            return redirect()->back();
        }
        return $next($request);
    }
}
