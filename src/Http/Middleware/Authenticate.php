<?php

namespace Wabi\Totem\Http\Middleware;

use Wabi\Totem\Totem;

class Authenticate
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return Totem::check($request) ? $next($request) : abort(403);
    }
}
