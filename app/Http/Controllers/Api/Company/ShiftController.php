<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyShift;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShiftController extends Controller
{
    public function getCompanyShifts($companyId)
    {
        try {
            // 1. Get the currently authenticated user
            $userId = auth('api')->id();

            // 2. Security Check: Verify this user actually owns the requested company
            $company = Company::where('id', $companyId)
                ->where('owner_id', $userId)
                ->first();

            if (!$company) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Unauthorized. You do not have access to this company or it does not exist.'
                ], 403); // 403 Forbidden is the correct HTTP status here
            }

            // 3. Fetch the shifts for this company
            $shifts = CompanyShift::where('company_id', $companyId)
                ->orderBy('created_at', 'desc')
                ->get();

            // 4. Return the data
            return response()->json([
                'status'  => 'success',
                'message' => 'Company shifts retrieved successfully.',
                'data'    => $shifts
            ], 200);
        } catch (\Exception $e) {
            Log::error('Fetch Shifts Failed: ' . $e->getMessage());

            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to fetch shifts. Please try again.',
            ], 500);
        }
    }


    public function addShift(Request $request, $companyId)
    {
        try {
            // 1. Security Check
            $userId = auth('api')->id();
            $company = Company::where('id', $companyId)->where('owner_id', $userId)->first();

            if (!$company) {
                return response()->json(['status' => 'error', 'message' => 'Unauthorized access to this firm.'], 403);
            }

            // 2. Validate input
            $request->validate([
                'shift_name' => 'required|string|max:255',
                'start_time' => 'required|date_format:H:i',
                'end_time'   => 'required|date_format:H:i',
            ]);

            // 3. Initialize Carbon instances to calculate exact cutoff times
            $start = Carbon::createFromFormat('H:i', $request->start_time);
            $end   = Carbon::createFromFormat('H:i', $request->end_time);

            // Calculate Late Cut Off (Start Time + X hrs/mins)
            $lateCutOff = $start->copy()
                ->addHours($request->late_cutoff_hr ?? 0)
                ->addMinutes($request->late_cutoff_min ?? 0)
                ->format('H:i:s');

            // Calculate Early Cut Off (End Time - X hrs/mins)
            $earlyCutOff = $end->copy()
                ->subHours($request->early_cutoff_hr ?? 0)
                ->subMinutes($request->early_cutoff_min ?? 0)
                ->format('H:i:s');

            // Calculate Punch In Limit (Start Time - X hrs/mins)
            $punchInLimit = null;
            if ($request->punch_in_limited) {
                $punchInLimit = $start->copy()
                    ->subHours($request->punch_in_limit_hr ?? 0)
                    ->subMinutes($request->punch_in_limit_min ?? 0)
                    ->format('H:i:s');
            }

            // Calculate Punch Out Limit (End Time + X hrs/mins)
            $punchOutLimit = null;
            if ($request->punch_out_limited) {
                $punchOutLimit = $end->copy()
                    ->addHours($request->punch_out_limit_hr ?? 0)
                    ->addMinutes($request->punch_out_limit_min ?? 0)
                    ->format('H:i:s');
            }

            $minWorkingHoursPresent = null;
            if ($request->min_working_hour) {
                // Ensure it formats exactly like '08:30:00'
                $hr = str_pad($request->min_work_present_hr ?? 0, 2, '0', STR_PAD_LEFT);
                $min = str_pad($request->min_work_present_min ?? 0, 2, '0', STR_PAD_LEFT);
                $minWorkingHoursPresent = "$hr:$min:00";
            }

            // Format Auto Punch Out Time
            $autoPunchTime = null;
            if ($request->auto_punch_out && $request->auto_punch_out_time) {
                $autoPunchTime = $request->auto_punch_out_time . ':00';
            }

            // 4. Save to Database
            $shift = CompanyShift::updateOrCreate([
                'id'         => $request->shift_id, // If null, creates new. If ID exists, updates it!
                'company_id' => $companyId,         // Extra security so one company can't edit another's shift
            ], [
                'shift_name' => $request->shift_name,
                'shift_start_time' => $start->format('H:i:s'),
                'shift_end_time' => $end->format('H:i:s'),

                'punch_in_rule' => $request->punch_in_limited ? 'LIMIT' : 'ANYTIME',
                'punch_in_limit_start_before' => $punchInLimit,
                'late_cut_off_time' => $lateCutOff,

                'punch_out_rule' => $request->punch_out_limited ? 'LIMIT' : 'ANYTIME',
                'punch_out_limit_start_after' => $punchOutLimit,
                'early_cut_off_time' => $earlyCutOff,

                'is_overnight_shift' => $request->is_overnight,
                'auto_punch_out' => $request->auto_punch_out,
                'has_minimum_working_hours' => $request->min_working_hour,

                'number_of_lates_for_half_day' => $request->lates_half_day ?? 0,
                'number_of_early_departures_for_half_day' => $request->early_half_day ?? 0,
                'number_of_lates_for_absent' => $request->lates_absent ?? 0,
                'number_of_early_departures_for_absent' => $request->early_absent ?? 0,
                'auto_punch_out' => $request->auto_punch_out,
                // Note: You may need to add an 'auto_punch_out_time' column to your database migration!
                'auto_punch_out_time' => $autoPunchTime,

                'has_minimum_working_hours' => $request->min_working_hour,
                'minimum_working_hours_for_present' => $minWorkingHoursPresent,
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Shift created successfully.',
                'data'    => $shift
            ], 201);
        } catch (\Exception $e) {
            Log::error('Create Shift Failed: ' . $e->getMessage());
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to save shift. Please try again.'.$e->getMessage(),
            ], 500);
        }
    }
}
