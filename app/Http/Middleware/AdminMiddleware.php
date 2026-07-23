<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //not login
        if(! Auth::check())
            abort(401 , 'plese login first');

        //not admin
        if(Auth::user()->type != "admin")
            abort(403, 'Access Denied.');

        //authorised
        return $next($request);
    }
}
