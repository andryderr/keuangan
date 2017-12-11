<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MyWeb
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()) {
            return $next($request);
        } else {
            return redirect('login');
        }
        
    }
}
