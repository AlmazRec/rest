<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MeasureResponseTime
{

    public function handle(Request $request, Closure $next): Response
    {
        $start = microtime(true);

        $response = $next($request);

        $end = microtime(true);
        $timeTaken = $end - $start;

        $response->headers->set('X-Response-Time', $timeTaken);

        return $response;
    }
}
