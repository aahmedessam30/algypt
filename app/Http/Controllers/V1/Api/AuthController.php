<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\V1\Api\Auth\{LoginRequest, RegisterRequest, ResetPasswordRequest};
use App\Http\Resources\V1\{ErrorResource, SuccessResource, ClientResource};
use App\Models\V1\Client;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
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

    public function register(RegisterRequest $request)
    {
        if ($client = Client::create($request->safe()->merge(['password' => Hash::make($request->password)])->all())) {
            $client->sendEmailVerificationNotification();
            return SuccessResource::make([
                'message' => __('auth.register_success'),
                'token' => $client->createToken('token')->plainTextToken,
                'user' => ClientResource::make($client),
            ])->withWrappData();
        }
        return ErrorResource::make(__('auth.register_failed'));
    }

    public function profile()
    {
        return auth()->check()
            ? ClientResource::make(auth()->user())
            : ErrorResource::make(__('auth.unauthenticated'));
    }

    public function logout()
    {
        if (auth()->check()) {
            auth()->user()->tokens()->delete();
            return SuccessResource::make(__('auth.logout_success'));
        }
        return ErrorResource::make(__('auth.unauthenticated'));
    }

    public function verifyEmail()
    {
        if (auth()->check()) {
            if (!auth()->user()->hasVerifiedEmail()) {
                auth()->user()->markEmailAsVerified();
                return SuccessResource::make(__('auth.email_verified'));
            }
            return ErrorResource::make(__('auth.email_already_verified'));
        }
        return ErrorResource::make(__('auth.unauthenticated'));
    }

    public function resendVerificationEmail()
    {
        if (auth()->check()) {
            if (!auth()->user()->hasVerifiedEmail()) {
                auth()->user()->sendEmailVerificationNotification();
                return SuccessResource::make(__('auth.email_verification_sent'));
            }
            return ErrorResource::make(__('auth.email_already_verified'));
        }
        return ErrorResource::make(__('auth.unauthenticated'));
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        if ($client = Client::whereEmail($request->email)->first()) {
            $client->sendPasswordResetNotification($client->createToken('token')->plainTextToken);
            return SuccessResource::make(__('auth.password_reset_email_sent'));
        }
        return ErrorResource::make(__('auth.email_not_found'));
    }
}
