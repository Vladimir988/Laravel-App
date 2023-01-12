<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class AdminPanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $request->user() || auth()->user()->role !== 'admin') {
            return redirect()->route('home.index');
        }

        return $next($request);
    }
}
