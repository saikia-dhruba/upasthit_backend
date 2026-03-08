<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function getMyCompanies(Request $request)
    {
        try {
            $userId = auth('api')->id();

            $companies = Company::where('owner_id', $userId)
                ->orderBy('is_default', 'desc')
                ->get([
                    'id',
                    'company_name',
                    'company_logo',
                    'industry_type',
                    'employee_count',
                    'company_code',
                    'is_default',
                    'created_at'
                ]); // Only selecting the fields the frontend actually needs

            // 3. Return the data
            return response()->json([
                'status'  => 'success',
                'message' => 'Companies retrieved successfully.',
                'data'    => $companies
            ], 200);
        } catch (\Exception $e) {
            Log::error('Fetch Companies Failed: ' . $e->getMessage());

            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to fetch companies. Please try again.',
            ], 500);
        }
    }

    public function switchCompany(Request $request)
    {
        $request->validate([
            'company_id' => 'required|integer'
        ]);

        try {
            $userId = auth('api')->id();
            $targetCompanyId = $request->company_id;
            $company = Company::where('id', $targetCompanyId)
                ->where('owner_id', $userId)
                ->first();

            if (!$company) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Workspace not found or unauthorized access.'
                ], 403);
            }
            Company::where('owner_id', $userId)->update(['is_default' => false]);
            $company->is_default = true;
            $company->save();

            return response()->json([
                'status'  => 'success',
                'message' => 'Switched to ' . $company->company_name . ' successfully.'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Switch Company Failed: ' . $e->getMessage());

            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to switch workspace. Please try again.',
            ], 500);
        }
    }

    public function addCompany(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'industry_type' => 'required|string|max:255',
            'employee_count' => 'required|integer',
        ]);

        try {
            $userId = auth('api')->id();

            // Create the new company
            $company = Company::create([
                'company_name'  => $request->company_name,
                'industry_type' => $request->industry_type,
                'employee_count' => $request->employee_count,
                'owner_id'      => $userId,
                'company_code'   => strtoupper(substr($request->company_name, 0, 3)) . '-' . rand(1000, 9999),
                'is_default'    => false, // New companies are not default by default
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Company created successfully.',
                'data'    => [
                    'id' => $company->id,
                    'company_name' => $company->company_name,
                    'industry_type' => $company->industry_type,
                    'employee_count' => $company->employee_count,
                    'company_code' => $company->company_code,
                    'is_default' => $company->is_default,
                    'created_at' => $company->created_at
                ]
            ], 201);
        } catch (\Exception $e) {
            Log::error('Add Company Failed: ' . $e->getMessage());

            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to create company. Please try again.',
            ], 500);
        }
    }

    public function getCompanyDetails($companyId)
    {
        try {
            // 1. Get the authenticated user object (so we have access to their email and phone)
            $user = auth('api')->user();

            // 2. Fetch the company and verify ownership
            $company = Company::where('id', $companyId)
                ->where('owner_id', $user->id)
                ->first();

            if (!$company) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Unauthorized. You do not have permission to view this company or it does not exist.'
                ], 403);
            }

            // 3. Format the data for the frontend
            $companyData = $company->toArray();

            // Fallback Logic: If company email/phone is null, use the owner's email/phone
            $companyData['email'] = $company->email ?: $user->email;
            $companyData['phone_number'] = $company->phone_number ?: $user->phone;

            // Format the logo URL
            if ($company->company_logo) {
                $companyData['company_logo_url'] = asset('storage/' . $company->company_logo);
            } else {
                $companyData['company_logo_url'] = null;
            }

            // 4. Return the data
            return response()->json([
                'status'  => 'success',
                'message' => 'Company details retrieved successfully.',
                'data'    => $companyData
            ], 200);
        } catch (\Exception $e) {
            Log::error('Fetch Company Details Failed: ' . $e->getMessage());

            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to fetch company details. Please try again.',
            ], 500);
        }
    }




    public function updateCompanyDetails(Request $request, $companyId)
    {
        try {
            $userId = auth('api')->id();
            $company = \App\Models\Company::where('id', $companyId)->where('owner_id', $userId)->first();

            if (!$company) {
                return response()->json(['status' => 'error', 'message' => 'Unauthorized access.'], 403);
            }

            // 1. Validation (Notice the required_if rules and boolean casting)
            $validated = $request->validate([
                'company_name' => 'required|string|max:255',
                'company_code' => 'nullable|string|max:50',
                'employee_code_start_with' => 'nullable|string|max:20',
                'employee_count' => 'nullable|integer',
                'industry_type' => 'nullable|string|max:255',
                'gstin' => 'nullable|string|max:50',

                'phone_number' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'address' => 'nullable|string',

                'is_geo_fenced' => 'boolean',
                'gps_geofence_data' => 'required_if:is_geo_fenced,1,true|nullable|string',

                'pay_period' => 'required|string',
                'enable_shift_wise_incentives' => 'boolean',
                'enable_payroll_cycle' => 'boolean',

                // Require start/end days ONLY if payroll cycle is enabled (1 or true)
                'payroll_cycle_start_day' => 'required_if:enable_payroll_cycle,1,true|nullable|integer',
                'payroll_cycle_end_day'   => 'required_if:enable_payroll_cycle,1,true|nullable|integer',

                // Image validation
                'company_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // 2. Handle Image Upload
            if ($request->hasFile('company_logo')) {
                // Delete old logo if it exists (optional but recommended)
                // if ($company->company_logo) { Storage::disk('public')->delete($company->company_logo); }

                $path = $request->file('company_logo')->store('company_logos', 'public');
                $company->company_logo = $path;
            }

            // 3. Update Text Data (Laravel converts "1"/"0" strings to booleans automatically)
            $company->update([
                'company_name' => $validated['company_name'],
                'company_code' => $validated['company_code'],
                'employee_code_start_with' => $validated['employee_code_start_with'],
                'employee_count' => $validated['employee_count'] ?? 0,
                'industry_type' => $validated['industry_type'],
                'gstin' => $validated['gstin'],

                'phone_number' => $validated['phone_number'],
                'email' => $validated['email'],
                'address' => $validated['address'],

                // If geofencing is turned off, clear the GPS data
                'is_geo_fenced' => $validated['is_geo_fenced'] ?? false,
                'gps_geofence_data' => ($validated['is_geo_fenced'] ?? false) ? $validated['gps_geofence_data'] : null,

                'pay_period' => $validated['pay_period'],
                'enable_shift_wise_incentives' => $validated['enable_shift_wise_incentives'] ?? false,

                // If payroll cycle is turned off, clear the start/end days
                'enable_payroll_cycle' => $validated['enable_payroll_cycle'] ?? false,
                'payroll_cycle_start_day' => ($validated['enable_payroll_cycle'] ?? false) ? $validated['payroll_cycle_start_day'] : null,
                'payroll_cycle_end_day' => ($validated['enable_payroll_cycle'] ?? false) ? $validated['payroll_cycle_end_day'] : null,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Updated successfully.', 'data' => $company], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['status' => 'error', 'message' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Update Company Failed: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to save details.'], 500);
        }
    }
}
