<?php

namespace Laraning\NovaSurveyor\Http\Middleware;

use Laraning\NovaSurveyor\NovaSurveyor;

class Authorize
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
        return resolve(NovaSurveyor::class)->authorize($request) ? $next($request) : abort(403);
    }
}
