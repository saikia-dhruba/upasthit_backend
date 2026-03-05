<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Registration\RegistrationController;
use Illuminate\Support\Facades\Route;

// simple API test
Route::get('test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API success'
    ]);
});


Route::prefix('registration')->group(function () {
    Route::post('check-phone-email',[RegistrationController::class,'checkPhoneEmail']);
    Route::post('verify-otp',[RegistrationController::class,'verifyOtp']);
    Route::post('/register-company',[RegistrationController::class,'registerCompany']);
});

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:api','single.device'])->group(function () {

    // The Logout Route
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('user')->group(function () {
        Route::get('/profile', [UserController::class, 'getProfile']);
        Route::post('/update-avatar', [UserController::class, 'updateAvatar']);
    });

    Route::prefix('company')->group(function () {
        Route::get('/my-companies', [CompanyController::class, 'getMyCompanies']);
        Route::post('/switch-firm', [CompanyController::class, 'switchCompany']);
    });
});
