<?php

namespace App\Http\Controllers\Api\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function checkPhoneEmail(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'nullable|unique:users,phone',
            'email' => 'nullable|unique:users,email',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 422);
        }
        try {
            if (!$request->phone && !$request->email) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'At least one of phone or email is required'
                ], 422);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Phone and email are available'
        ]);
    }
}
