<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class SingleDeviceLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            // Get the token payload
            $payload = JWTAuth::parseToken()->getPayload();
            $user = auth('api')->user();

            // Check if the token's session_id matches the database
            if ($payload->get('session_id') !== $user->current_jwt_session) {

                // Optional: You can invalidate the old token in the blacklist here
                JWTAuth::invalidate(JWTAuth::getToken());

                return response()->json([
                    'status' => 'error',
                    'message' => 'Your account was logged in from another device. Please log in again.'
                ], 401);
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'Token is invalid or expired.'], 401);
        }

        return $next($request);
    }
}
