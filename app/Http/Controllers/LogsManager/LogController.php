<?php

namespace App\Http\Controllers\LogsManager;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\ErrorLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function logActivity(){
        $activityLogs = ActivityLog::latest()->paginate(20);
        return view('logs.activity-logs', compact('activityLogs'));
    }

    public function logError(){
        $errorLogs = ErrorLog::latest()->paginate(20);
        return view('logs.error-logs', compact('errorLogs'));
    }
}
