<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\{AuthController,PackageController,IndustryController};

// Login & OTP
Route::get('/', fn () => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/get-email-otp', [AuthController::class, 'sendEmailOtp'])->name('email.otp');
Route::post('/otp-login', [AuthController::class, 'loginWithOtp'])->name('otp.login');

// Public API
Route::get('/packages-list', [PackageController::class, 'getAllPackages'])->name('packages.list');
Route::get('/industry-type-list', [IndustryController::class, 'getAllIndustryTypes'])->name('industry.type.list');

// Superadmin routes
Route::prefix('superadmin')->middleware(['auth', 'role.check:superadmin'])->group(function () {
    Route::get('/company', [CompanyController::class, 'viewCompanyPage'])->name('superadmin.company.view');
    Route::get('/dashboard', [AuthController::class, 'superadminDashboard'])->name('superadmin.dashboard');
    Route::post('/add-company', [CompanyController::class, 'createCompany'])->name('superadmin.company.store');
});


// Company routes
Route::prefix('company')->middleware(['auth', 'role.check:company'])->group(function () {
    Route::get('/dashboard', [CompanyController::class, 'companyDashboard'])->name('company.dashboard');
    Route::get('/employee', [CompanyController::class, 'employeeViewPage'])->name('company.employee.page');
    Route::get('/profile', [CompanyController::class, 'companyViewPage'])->name('company.company.page');
    Route::get('/human-resource', [CompanyController::class, 'hrViewPage'])->name('company.hr.page');
    Route::get('/attendance', [CompanyController::class, 'attendanceViewPage'])->name('company.attendance.page');
    Route::get('/projects', [CompanyController::class, 'projectsViewPage'])->name('company.projects.page');
    Route::get('/clients', [CompanyController::class, 'clientsViewPage'])->name('company.clients.page');
    Route::get('/payroll', [CompanyController::class, 'payrollViewPage'])->name('company.payroll.page');
    Route::get('/reports', [CompanyController::class, 'reportsViewPage'])->name('company.reports.page');
    Route::get('/settings', [CompanyController::class, 'settingsViewPage'])->name('company.settings.page');
});

