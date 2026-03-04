<?php

namespace App\Http\Controllers\Api\Registration;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\EmployeeProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\OtpVerification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{
    public function checkPhoneEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 422);
        }

        if (!$request->phone && !$request->email) {
            return response()->json([
                'status' => 'error',
                'message' => 'At least one of phone or email is required'
            ], 422);
        }

        // 1. Check if user exists with phone/email and role is not Admin
        $userQuery = User::query();
        if ($request->phone) {
            $userQuery->orWhere('phone', $request->phone);
        }
        if ($request->email) {
            $userQuery->orWhere('email', $request->email);
        }

        $user = $userQuery
            // ->whereDoesntHave('roles', function($q) {
            //     $q->where('name', 'Admin');
            // })
            ->first();

        if ($user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Phone or email already exists for a non-Admin user.'
            ], 409);
        }

        // 2. Define Identifier (Phone takes priority if both are somehow sent)
        $identifier = $request->phone ?: $request->email;

        // 3. Generate OTP and Expiration Time (e.g., 10 minutes from now)
        $otp = rand(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(10);

        // 4. Store in Database (Updates existing or creates new)
        OtpVerification::updateOrCreate(
            ['identifier' => $identifier],
            [
                'otp' => $otp,
                'expires_at' => $expiresAt
            ]
        );

        // TODO: Trigger your SMS/WhatsApp/Email notification here

        return response()->json([
            'status' => 'success',
            'message' => 'OTP sent successfully',
            'otp' => $otp // REMOVE THIS IN PRODUCTION!
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'otp' => 'required|digits:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 422);
        }

        if (!$request->phone && !$request->email) {
            return response()->json([
                'status' => 'error',
                'message' => 'At least one of phone or email is required'
            ], 422);
        }

        $identifier = $request->phone ?: $request->email;
        $inputOtp = $request->otp;

        // 1. Find the OTP record in the database
        $otpRecord = OtpVerification::where('identifier', $identifier)->first();

        // 2. Check if record exists
        if (!$otpRecord) {
            return response()->json([
                'status' => 'error',
                'message' => 'No OTP found for this contact. Please request a new one.'
            ], 404);
        }

        // 3. Check if OTP is expired
        if (Carbon::now()->isAfter($otpRecord->expires_at)) {
            $otpRecord->delete(); // Clean up expired OTP
            return response()->json([
                'status' => 'error',
                'message' => 'OTP has expired. Please request a new one.'
            ], 401);
        }

        // 4. Check if OTP matches
        if ($otpRecord->otp !== $inputOtp) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid OTP.'
            ], 401);
        }

        // 5. Success! Delete the OTP so it cannot be reused
        $otpRecord->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'OTP verified successfully.'
        ]);
    }

    public function registerCompany(Request $request)
    {
        // 1. Validate the incoming request
        $validator = Validator::make($request->all(), [
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email', // Must be unique in users table
            'phone_number'   => 'required|string|unique:users,phone',
            'business_name'  => 'required|string|max:255',
            'designation'    => 'required|string|max:255',
            'employee_count' => 'required|integer|min:1',
            'password'       => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors()
            ], 422);
        }

        // 2. Use a Database Transaction to ensure all or nothing
        try {
            DB::beginTransaction();

            // A. Create the User (The Business Owner)
            $user = User::create([
                'username'          => $request->email, // Assuming username is the email
                'name'         => trim($request->first_name . ' ' . $request->last_name),
                'email'             => $request->email,
                'phone'      => $request->phone_number,
                'password'          => Hash::make($request->password), // Securely hash the password
                'registration_type' => 'OWNER',
            ]);
            if(!Company::where('owner_id', $user->id)->exists()){
                $is_default = true;
            }

            // B. Create the Company linked to this User
            $company = Company::create([
                'owner_id'       => $user->id,
                'company_name'   => $request->business_name,
                'employee_count' => $request->employee_count,
                'company_code'   => strtoupper(substr($request->business_name, 0, 3)) . '-' . rand(1000, 9999), // Simple unique code generation
                'is_default'     => $is_default ?? false,
                ]);

            // C. Create an Employee Profile for the Owner
            // This is crucial so the owner can act as an Admin/Manager within their own HR system
            EmployeeProfile::create([
                'user_id'         => $user->id,
                'company_id'      => $company->id,
                'designation'     => $request->designation,
                'role_type'       => 'ADMIN', // Set them as the system admin
                'wage_type'       => 'MONTHLY',
                'date_of_joining' => now(),
                'is_active'       => true,
            ]);

            DB::commit(); // Everything succeeded, save to database

            $user->current_jwt_session = \Illuminate\Support\Str::random(60);
            $user->save();

            // Generate the Tymon JWT token
            $token = auth('api')->login($user);

            return response()->json([
                'status'  => 'success',
                'message' => 'Company registered successfully.',
                'data'    => [
                    'user_id'      => $user->id,
                    'company_id'   => $company->id,
                    'company_name' => $company->company_name,
                    'access_token' => $token,
                    'token_type'   => 'bearer',
                ]
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack(); // Something failed, undo all database changes

            // Log the error for your own debugging
            Log::error('Company Registration Failed: ' . $e->getMessage());

            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to register company. Please try again.',
                'error'   => $e->getMessage() // You can hide this in true production
            ], 500);
        }
    }
}
