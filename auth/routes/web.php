<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\StudentAuthController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Show login/register page
Route::get('/login-register', [StudentAuthController::class, 'showLoginRegister'])->name('login');



// Student registration
Route::get('/student-register', [StudentAuthController::class, 'register'])->name('student-register');
Route::post('/student-register', [StudentAuthController::class, 'register'])->name('student-register');

// Student login
Route::post('/student-login', [StudentAuthController::class, 'login'])->name('student-login');

// Student dashboard (protected route)
Route::get('/student-dashboard', [StudentAuthController::class, 'dashboard'])
    ->name('student-dashboard')
    ->middleware('auth:student');

// Student logout
Route::get('/student-logout', [StudentAuthController::class, 'logout'])->name('student-logout');

// Forgot password routes
Route::get('/forgot-password', [StudentAuthController::class, 'showForgotPasswordForm'])->name('forgot.password.form');
Route::post('/forgot-password', [StudentAuthController::class, 'sendResetLinkEmail'])->name('forgot.password.email');

// Reset password routes
Route::get('/reset-password/{token}', [StudentAuthController::class, 'showResetForm'])->name('reset.password.form');
Route::post('/reset-password', [StudentAuthController::class, 'resetPassword'])->name('reset.password');

//Admin

use App\Http\Controllers\Auth\AdminAuthController;

Route::get('/login-admin', [AdminAuthController::class, 'showLoginAdminForm'])->name('admin.login');
Route::post('/login-admin', [AdminAuthController::class, 'loginAdmin']);
Route::get('/admin-forgot-password', [AdminAuthController::class, 'showForgotPasswordAdminForm'])->name('admin.forgot.password.form');
Route::post('/admin-forgot-password', [AdminAuthController::class, 'sendResetLinkAdminEmail'])->name('admin.forgot.password.email');
Route::get('/admin-reset-password/{token}', [AdminAuthController::class, 'showResetAdminForm'])->name('admin.reset.password.form');
Route::post('/admin-reset-password', [AdminAuthController::class, 'resetPasswordAdmin'])->name('admin.reset.password');
Route::get('/admin-dashboard', [AdminAuthController::class, 'admindashboard'])
    ->name('admin-dashboard')
    ->middleware('auth:admin');

    Route::get('/admin-logout', [AdminAuthController::class, 'adminlogout'])->name('admin-logout');