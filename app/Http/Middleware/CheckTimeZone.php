<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class CheckTimeZone
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        Config::set('app.timezone', $request->header('Accept-TimeZone') ?? Config::get('app.timezone'));
        return $next($request)->header('Accept-TimeZone', Config::get('app.timezone'));
    }
}
