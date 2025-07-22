<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash,Mail};
use Illuminate\Support\Facades\{Validator,Storage,Auth,Config};
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\{User};
use App\Helpers\{ToastHelper};
use App\Mail\SendOtpMail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->jobStatus === 'Inactive') {
                Auth::logout();
                return response()->json([
                    'status' => 'error',
                    'message' => 'You are an inactive employee.'
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Superadmin logged in successfully.',
                'redirect' => route('superadmin.dashboard')
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials.'
        ]);
    }

    public function superadminDashboard()
    {
        return view('superadmin.dashboard');
    }

    public function sendEmailOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email not found.'
            ], 404);
        }

        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(2);
        $user->save();

        Mail::to($user->email)->send(new SendOtpMail($otp));

        return response()->json(['status' => 'success', 'message' => 'OTP sent successfully.']);
    }

    public function loginWithOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Invalid email.'], 401);
        }

        if (!$user->otp || $user->otp !== $request->otp) {
            return response()->json(['status' => 'error', 'message' => 'Invalid OTP.'], 401);
        }

        if (now()->greaterThan($user->otp_expires_at)) {
            return response()->json(['status' => 'error', 'message' => 'OTP expired. Please request a new one.'], 401);
        }

        // OTP is valid, login the user
        Auth::guard('web')->login($user);

        // Clear OTP fields
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Superadmin logged in successfully.',
            'redirect' => route('superadmin.dashboard'),
        ]);
    }

}
