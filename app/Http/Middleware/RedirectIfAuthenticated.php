<?php

namespace App\Http\Middleware;

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
        // adminとユーザでログイン済みの場合のリダイレクト先の切り分け
        $redirectPath = $guard === 'user' ? '/home' : '/admin/top';

        if (Auth::guard($guard)->check()) {
            return redirect($redirectPath);
        }

        return $next($request);
    }
}
