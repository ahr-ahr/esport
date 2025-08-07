<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'User tidak ditemukan'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Unauthorized: ' . $e->getMessage()], 401);
        }

        return $next($request);
    }
}
