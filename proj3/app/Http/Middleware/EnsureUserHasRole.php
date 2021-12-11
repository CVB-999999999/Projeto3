<?php

namespace App\Http\Middleware;

use Closure;

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
        if (! $request->user()->type == $role) {
            return back()->with('error', 'You do not have permission to access this page');
        }

        return $next($request);
    }

}
