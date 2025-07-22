<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\{AuthController};

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('superadmin.login');
Route::post('/get-email-otp', [AuthController::class, 'sendEmailOtp'])->name('email.otp');
Route::post('/otp-login', [AuthController::class, 'loginWithOtp'])->name('superadmin.otp.login');

// auth
Route::get('/dashboard', [AuthController::class, 'superadminDashboard'])->name('superadmin.dashboard');
Route::get('/company', [CompanyController::class, 'viewCompanyPage'])->name('superadmin.company.view');
