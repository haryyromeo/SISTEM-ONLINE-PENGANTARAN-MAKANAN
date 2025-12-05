<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SellerMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('seller')->check()) {
            return redirect('/loginSeller')
                ->with('error', 'Silakan login dulu.');
        }

        return $next($request);
    }
}
