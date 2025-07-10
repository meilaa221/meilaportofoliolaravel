<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is not authenticated
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Please login to access this area.');
        }

        // Check if user is not admin
        if (!auth()->user()->isAdmin()) {
            return redirect('/')->with('error', 'Access denied. You do not have permission to access the admin area.');
        }

        return $next($request);
    }
}
