<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyAdminToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $admin = Auth::guard('admin')->user();
        if (!$admin || $request->header('Admin-Token') !== $admin->token) {
            return response()->json(['error' => 'Token tidak valid.'], 403);
        }
    
        return $next($request);
    }
    
}
