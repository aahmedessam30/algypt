<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Api\{AuthController, ClientController, HomeController};

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');

Route::middleware('auth:sanctum')->group(function () {

    // Auth Routes
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('verify-email', [AuthController::class, 'verifyEmail'])->name('verify-email');
    Route::post('resend-verification-email', [AuthController::class, 'resendVerificationEmail'])->name('resend-verification-email');

    // Home Route
    Route::get('/home', [HomeController::class, '__invoke'])->name('home');

    // Client Routes
    Route::apiResource('clients', ClientController::class);
});
