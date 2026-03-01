<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use App\Models\ErrorLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ActivityLogMiddleware
{
    /**
     * Get device type from user agent
     */
    private function getDeviceType(Request $request): string
    {
        $userAgent = strtolower($request->userAgent());

        if (preg_match('/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i', $userAgent)) {
            return 'tablet';
        } elseif (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|ios)/i', $userAgent)) {
            return 'mobile';
        } else {
            return 'desktop';
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // capture authenticated user id before controller may log out
        $userId = Auth::id();

        try {
            // proceed with request
            $response = $next($request);
        } catch (\Throwable $e) {
            // log the exception to database before rethrowing
            ErrorLog::create([
                'user_id'     => $userId ?? 0,
                'route'       => $request->path(),
                'method'      => $request->method(),
                'ip'          => $request->ip(),
                'user_agent'  => $request->userAgent(),
                'device_type' => $this->getDeviceType($request),
                'message'     => $e->getMessage(),
                'exception'   => get_class($e),
                'stack_trace' => $e->getTraceAsString(),
                'request_data'=> $request->except(['password', '_token']),
            ]);

            throw $e;
        }

        // skip internal activity log endpoint so we don't recurse
        if ($request->is('admin/activity-log*')) {
            return $response;
        }

        // store 0 for guests
        ActivityLog::create([
            'user_id'     => $userId ?? 0,
            'route'       => $request->path(),
            'method'      => $request->method(),
            'ip'          => $request->ip(),
            'user_agent'  => $request->userAgent(),
            'device_type' => $this->getDeviceType($request),
            'request_data'=> $request->except(['password', '_token']),
        ]);

        return $response;
    }
}
