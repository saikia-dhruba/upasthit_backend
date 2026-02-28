<?php

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
    Route::post('chaeck-phone-email',[RegistrationController::class,'checkPhoneEmail']);
});
