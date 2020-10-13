<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        if (Auth::guard($guard)->check()
            || Auth::guard('beneficiary')->check()
            || Auth::guard('agency')->check()) {
            return redirect('/');
        }elseif(Auth::guard('admin')->check()){
            return redirect(route('Admin::root'));
        }

        return $next($request);
    }
}
