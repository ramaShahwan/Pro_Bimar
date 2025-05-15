<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle($request, Closure $next)
{
    if (Auth::guard('manager')->check() && Auth::guard('manager')->user()->role === 'manager') {
        return $next($request);
    }

    return redirect()->route('login')->withErrors(['access' => 'غير مصرح لك بالدخول.']);
}
}
