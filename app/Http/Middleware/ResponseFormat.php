<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Responses\Factory\ResponseFormatFactory;

class ResponseFormat
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
        $request->formatter = ResponseFormatFactory::build($request);

        return $next($request);
    }
}
