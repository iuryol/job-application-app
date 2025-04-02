<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SetAuthGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(url()->previous() == route('login.recruiter') ){
            Auth::setDefaultDriver('admin');
        }

        if(url()->previous() == route('login.candidate')){
            Auth::setDefaultDriver('user');
        }
        return $next($request);
    }
}
