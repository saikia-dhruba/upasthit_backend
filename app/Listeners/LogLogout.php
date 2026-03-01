<?php

namespace App\Listeners;

use App\Models\ActivityLog;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;

class LogLogout
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

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
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        ActivityLog::create([
            'user_id'     => $event->user->id,
            'route'       => $this->request->path(),
            'method'      => $this->request->method(),
            'ip'          => $this->request->ip(),
            'user_agent'  => $this->request->userAgent(),
            'device_type' => $this->getDeviceType($this->request),
            'request_data'=> json_encode(['action' => 'logout']),
        ]);
    }
}
