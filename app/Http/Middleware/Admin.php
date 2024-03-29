<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    
     
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->is_admin == 1) {
            return $next($request);
        } else {
            return redirect('login');
        }
        
        return $next($request);
    }
}
