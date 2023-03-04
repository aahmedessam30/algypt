<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

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
