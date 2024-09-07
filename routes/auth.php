<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthDefault\AuthenticatedSessionController;
use App\Http\Controllers\AuthDefault\EmailVerificationNotificationController;
use App\Http\Controllers\AuthDefault\NewPasswordController;
use App\Http\Controllers\AuthDefault\PasswordResetLinkController;
use App\Http\Controllers\AuthDefault\RegisteredUserController;
use App\Http\Controllers\AuthDefault\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->controller(AuthController::class)->group(function()
{
    Route::post('/register', 'register')->middleware('guest:sanctum');
    Route::post('/login', 'login')->middleware('guest:sanctum');

    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});

// Route::post('/register', [RegisteredUserController::class, 'store'])
//                 ->middleware('guest')
//                 ->name('register');
//
// Route::post('/login', [AuthenticatedSessionController::class, 'store'])
//                 ->middleware('guest')
//                 ->name('login');
//
// Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
//                 ->middleware('guest')
//                 ->name('password.email');
//
// Route::post('/reset-password', [NewPasswordController::class, 'store'])
//                 ->middleware('guest')
//                 ->name('password.store');
//
// Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
//                 ->middleware(['auth', 'signed', 'throttle:6,1'])
//                 ->name('verification.verify');
//
// Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//                 ->middleware(['auth', 'throttle:6,1'])
//                 ->name('verification.send');
//
// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
//                 ->middleware('auth')
//                 ->name('logout');
