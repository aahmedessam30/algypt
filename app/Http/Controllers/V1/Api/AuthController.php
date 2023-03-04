<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Auth\{LoginRequest, RegisterRequest, ResetPasswordRequest};
use App\Http\Resources\V1\{ErrorResource, SuccessResource, ClientResource};
use App\Models\V1\Client;

class AuthController extends Controller
{
    public function login(LoginRequest $request): SuccessResource|ErrorResource
    {
        if ($client = Client::whereEmail($request->email)->first()) {
            if ($client->hasVerifiedEmail()) {
                if (auth('client')->attempt($request->safe()->only('email', 'password'))) {
                    return SuccessResource::make([
                        'message' => __('auth.login_success'),
                        'token' => $client->createToken('token')->plainTextToken,
                        'user' => ClientResource::make($client),
                    ])->withWrappData();
                }
                return ErrorResource::make(__('auth.login_failed'));
            }
            return ErrorResource::make(__('auth.email_not_verified'));
        }
        return (ErrorResource::make(__('auth.check_email_password')));
    }

    public function register(RegisterRequest $request): SuccessResource|ErrorResource
    {
        if ($client = Client::create($request->safe()->all())) {
            return SuccessResource::make([
                'message' => __('auth.register_success'),
                'verification' => $client->sendEmailVerificationNotification(),
                'token' => $client->createToken('token')->plainTextToken,
                'user' => ClientResource::make($client),
            ])->withWrappData();
        }
        return ErrorResource::make(__('auth.register_failed'));
    }

    public function logout(): SuccessResource|ErrorResource
    {
        return auth()->user()->tokens()->delete()
            ? SuccessResource::make(__('auth.logout_success'))
            : ErrorResource::make(__('auth.logout_failed'));
    }

    public function verifyEmail(): SuccessResource|ErrorResource
    {
        if (!auth()->user()->hasVerifiedEmail()) {
            auth()->user()->markEmailAsVerified();
            return SuccessResource::make(__('auth.email_verified'));
        }
        return ErrorResource::make(__('auth.email_already_verified'));
    }

    public function resendVerificationEmail(): SuccessResource|ErrorResource
    {
        if (!auth()->user()->hasVerifiedEmail()) {
            auth()->user()->sendEmailVerificationNotification();
            return SuccessResource::make(__('auth.email_verification_sent'));
        }
        return ErrorResource::make(__('auth.email_already_verified'));
    }

    public function resetPassword(ResetPasswordRequest $request): SuccessResource|ErrorResource
    {
        if ($client = Client::whereEmail($request->email)->first()) {
            $client->sendPasswordResetNotification($client->createToken('token')->plainTextToken);
            return SuccessResource::make(__('auth.password_reset_email_sent'));
        }
        return ErrorResource::make(__('auth.email_not_found'));
    }
}
