<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!\Auth::user()->hasRole($role)){
            /* TODO переделать на модальное окно*/
            abort(403, __('auth.noaccess'));
        }
        return $next($request);
    }
}
