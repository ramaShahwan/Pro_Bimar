<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Bimar_User;
use Illuminate\Support\Facades\Auth;

class Trainer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('trainer')->check()) {
            $user = Auth::guard('trainer')->user();
            if ($user->Bimar_Role === 'trainer') {
                return $next($request);
            }
        }
        return redirect('/');
    }
}


