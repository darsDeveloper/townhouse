<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class RedirectIfNonWWW
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

        $host = env('TENANCY_DEFAULT_HOSTNAME');

        if($request->getHost() == $host){

            return Redirect::to("http://www.$host");
        }

        return $next($request);
    }
}
