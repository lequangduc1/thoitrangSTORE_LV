<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;

class CheckUnLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth('quantri')->check()){
            return $next($request);
        }
        return redirect()->route('admin.dashboard.index');
    }
}
