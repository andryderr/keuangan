<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;



class MyAuth    
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $data = explode('/', $request->path());
        // echo "pathku".$data[0]." log: ".Auth::user()->poli->prefix;
        if (Auth::user()) {
            $d = Auth::user()->poli->prefix;
            if ($d == $data[0]) {
                // echo "yes";
                return $response;
            }else{
                return back();
            }
        }else{
            return redirect('login');
        }
    }
}
