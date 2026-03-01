<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LogsManager\LogController;
use App\Http\Controllers\UserManegement\PermissionController;
use App\Http\Controllers\UserManegement\RoleController;
use App\Http\Controllers\UserManegement\RolesController;
use App\Http\Controllers\UserManegement\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('activity-logs')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('user/login', [AuthenticatedSessionController::class, 'index'])->name('login');
    Route::post('user/login', [AuthenticatedSessionController::class, 'store'])->name('user.store');

    Route::middleware(['auth'])->group(function () {
        Route::get('user/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::prefix('user')->name('user.')->group(function () {
            //DASHBOARD
            Route::get('dashboard', function () {
                // We will create this view in the next step
                return view('layouts.user');
            })->name('dashboard');

            // USER ROLES AND PERMISSION MANAGEMENT
            Route::prefix('management')->group(function () {
                Route::prefix('roles')->name('roles.')->group(function () {
                    Route::get('/', [RoleController::class, 'index'])->name('index')->middleware('permission:roles.view');
                    Route::post('/', [RoleController::class, 'store'])->name('store')->middleware('permission:roles.create');
                    Route::put('/{role}', [RoleController::class, 'update'])->name('update')->middleware('permission:roles.edit');
                    Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy')->middleware('permission:roles.delete');
                });

                Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index')->middleware('permission:permissions.view');
                Route::post('permissions/sync', [PermissionController::class, 'sync'])->name('permissions.sync')->middleware('permission:permissions.sync');
                Route::prefix('users')->name('users.')->group(function () {
                    Route::get('/', [UserController::class, 'index'])->name('index')->middleware('permission:users.view');
                    Route::get('/create', [UserController::class, 'create'])->name('create')->middleware('permission:users.create');
                    Route::post('/', [UserController::class, 'store'])->name('store')->middleware('permission:users.create');
                    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit')->middleware('permission:users.edit');
                    Route::put('/{user}', [UserController::class, 'update'])->name('update')->middleware('permission:users.edit');
                    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy')->middleware('permission:users.delete');
                });
            });

            // LOGS
            Route::prefix('logs')->group(function () {
                Route::get('activity', [LogController::class, 'logActivity'])->name('logs.activity')->middleware('permission:logs.view');
                Route::get('errors', [LogController::class, 'logError'])->name('logs.errors')->middleware('permission:logs.view');
            });
        });
    });
});
