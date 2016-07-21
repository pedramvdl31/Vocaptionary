<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Job;
use Laracasts\Flash\Flash;
use Session;
use URL;
class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                // $redirect_path = ($request->is('admins') || $request->is('admins/*')) ? '/admins/login' : '/users/login';
                return redirect('/admins/login');
            }
        }
        return $next($request);
    }
}
