<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsProductManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('api')->check() && Auth::guard('api')->user()->is_admin) {
            
            $role = Auth::guard('api')->user()->admin->role;

            if(in_array($role, ['super_admin', 'product_manager'])) {
                return $next($request);
            }
            return response()->json(['message' => 'Unauthorized'], 403);
        } else {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    }
}
