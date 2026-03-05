<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getProfile(Request $request)
    {
        try {
            $user = auth('api')->user();

            if (!$user) {
                return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
            }

            // Construct the full, absolute URL for the avatar so the Flutter app can render it
            $avatarUrl = $user->avatar ? asset('storage/' . $user->avatar) : '';

            return response()->json([
                'status'  => 'success',
                'message' => 'Profile retrieved successfully.',
                'data'    => [
                    'full_name'    => $user->name,
                    'email'        => $user->email,
                    'phone_number' => $user->phone,
                    'avatar_url'   => $avatarUrl,
                ]
            ], 200);

        } catch (\Exception $e) {
            Log::error('Fetch Profile Failed: ' . $e->getMessage());
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to fetch profile.',
            ], 500);
        }
    }

    /**
     * Upload and update the user's avatar.
     */
    public function updateAvatar(Request $request)
    {
        // 1. Validate that an actual image file was sent, under 2MB
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $user = auth('api')->user();

            if ($request->hasFile('avatar')) {
                // 2. Delete the old avatar from storage if it exists to save space
                if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                    Storage::disk('public')->delete($user->avatar);
                }

                // 3. Store the new file in the 'avatars' directory inside storage/app/public/
                $path = $request->file('avatar')->store('avatars', 'public');

                // 4. Update the database
                $user->avatar = $path;
                $user->save();

                // 5. Return the new full URL to the Flutter app so it can update the UI instantly
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Avatar updated successfully.',
                    'data'    => [
                        'avatar_url' => asset('storage/' . $path)
                    ]
                ], 200);
            }

            return response()->json(['status' => 'error', 'message' => 'No file provided.'], 400);

        } catch (\Exception $e) {
            Log::error('Avatar Upload Failed: ' . $e->getMessage());
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to upload avatar.',
            ], 500);
        }
    }
}
