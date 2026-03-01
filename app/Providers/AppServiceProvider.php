<?php

namespace App\Providers;

use App\Listeners\LogLogout;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // load API routes if file exists
        if (file_exists(base_path('routes/api.php'))) {
            Route::prefix('api/v1/')->middleware(['api','activity-logs'])
                 ->group(base_path('routes/api.php'));
        }
    }
}
