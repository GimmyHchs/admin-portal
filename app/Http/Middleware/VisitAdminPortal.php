<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VisitAdminPortal
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
        $user = Auth::user();

        if(! $user->hasPermission('VisitAdminPortal')) {
            return redirect('/denied');
        }

        return $next($request);
    }
}
