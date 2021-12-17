<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */

    public function handle($request, Closure $next, $role)
    {
        if(Auth::user() == null) {
            return redirect('/login');
        }
        if (! $request->user()->type == $role) {
            return back()->with('error', 'You do not have permission to access this page');
        }

        return $next($request);
    }

}
