<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Auth\StudentRegisterController;
use App\Http\Controllers\Auth\StudentController;
use App\Http\Controllers\Auth\StudentResetPasswordController;
use App\Http\Controllers\Auth\StudentForgotPasswordController;

use Illuminate\Support\Facades\Route;



//Admin Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Admin Register
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

//Forgot-password Link setup
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//Reset Password 
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

//Admin Dashboard redirected after Login
Route::get('/admindashboard', [AdminController::class, 'index'])->name('admindashboard');

//Forgot Password for admins
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.store');

// Password Reset Routes for admins
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');


//Students Login 
Route::get('/student-login', [StudentAuthController::class, 'showLoginForm'])->name('student-login');
Route::post('/student-login', [StudentAuthController::class, 'login'])->name('student-login.post');
Route::post('student-logout', [StudentAuthController::class, 'logout'])->name('student-logout');

//Students Register
Route::get('/student-register', [StudentRegisterController::class, 'showRegisterForm'])->name('student-register');
Route::post('/student-register', [StudentRegisterController::class, 'register'])->name('student-register.post');

//Students Forgot Password
Route::get('/studentforgot-password', [StudentForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/studentforgot-password', [StudentForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//Students Reset-password
Route::get('/studentreset-password/{token}', [StudentResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/studentreset-password', [StudentResetPasswordController::class, 'reset'])->name('password.update');


//Student Dashboard
Route::get('/studentdashboard', [StudentController::class, 'index'])->name('studentdashboard');

//Forgot Password for students
Route::get('studentforgot-password', [StudentForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('studentforgot-password', [StudentForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('studentreset-password/{token}', [StudentResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('studentreset-password', [StudentResetPasswordController::class, 'reset'])->name('password.store');

// Password Reset Routes for students
Route::get('password/reset', [StudentForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [StudentForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [StudentResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('tpassword/reset', [StudentResetPasswordController::class, 'reset'])->name('password.update');