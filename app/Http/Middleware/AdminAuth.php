<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $admin = Admin::where('api_token', $token)->first();

        if (!$admin) {
            return response()->json([
                'message' => 'Invalid token'
            ], 401);
        }

        return $next($request);
    }
}