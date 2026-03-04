<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
}
