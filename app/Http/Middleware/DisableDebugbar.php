<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DisableDebugbar
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
        if(!in_array($request->route()->getName(),[
            'magic-images.show'
        ]) && !env('DEBUGBAR_ENABLED',false)){
            debugbar()->disable();
        }
        return $next($request);
    }
}
