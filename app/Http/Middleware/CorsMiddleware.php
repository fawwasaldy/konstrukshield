<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Allow all origins or specify your front-end URL
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')  // Set specific domains like 'http://localhost:5173' instead of '*'
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, X-Auth-Token, Authorization');
    }
}

