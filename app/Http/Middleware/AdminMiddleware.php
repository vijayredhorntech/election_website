<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in and has the role 'admin'
        if (auth()->check() && auth()->user()->role->name === 'admin') {
            return $next($request);
        }

        // Redirect or abort if the user is not an admin
        return redirect()->route('dashboard')->with('error', 'Access Denied! Admins Only.');
    }
}
