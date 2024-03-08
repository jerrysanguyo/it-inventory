<?php

namespace App\Http\Middleware\encoder;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class encoderRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role_Id === 0) { // 0 encoder
            return $next($request);
        }
        
        return redirect()->route('Unauthorized-access');
    }
}
