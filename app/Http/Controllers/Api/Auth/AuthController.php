<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        // Check user and password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // 1. Invalidate previous sessions by generating a new unique string
        $user->current_jwt_session = Str::random(60);
        $user->save();
        $company_details = Company::select('id','company_code','company_name','company_logo','owner_id','is_default')->where('owner_id', $user->id)->where('is_default', true)->first();

        // 2. Generate the token (This will now include the NEW session_id in its payload)
        $token = auth('api')->login($user);

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'company_details' => $company_details
        ]);
    }


    public function logout(Request $request)
    {
        try {
            // 1. Get the currently authenticated user
            $user = auth('api')->user();

            if ($user) {
                // 2. Clear the single-device session ID from the database
                $user->current_jwt_session = null;
                $user->save();
            }

            // 3. Invalidate the current token
            // This adds the token to Tymon's blacklist so it cannot be reused
            auth('api')->logout();

            return response()->json([
                'status'  => 'success',
                'message' => 'Successfully logged out.'
            ], 200);

        } catch (Exception $e) {
            Log::error('Logout Failed: ' . $e->getMessage());

            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to logout. The token might already be invalid or expired.',
            ], 500);
        }
    }
}
