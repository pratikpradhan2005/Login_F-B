<?php
//Default Admin Authentication Setup
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController; 
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

//Customized Student Authentication Setup
use App\Http\Controllers\Auth\StudentAuthenticatedSessionController;
use App\Http\Controllers\Auth\StudentConfirmablePasswordController;
use App\Http\Controllers\Auth\StudentEmailVerificationNotificationController;
use App\Http\Controllers\Auth\StudentEmailVerificationPromptController; 
use App\Http\Controllers\Auth\StudentNewPasswordController;
use App\Http\Controllers\Auth\StudentPasswordController;
use App\Http\Controllers\Auth\StudentPasswordResetLinkController;
use App\Http\Controllers\Auth\StudentRegisteredUserController;
use App\Http\Controllers\Auth\StudentVerifyEmailController;

use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

        // Forgot Password
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
->middleware('guest')
->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
->middleware('guest')
->name('password.email');

// Reset Password
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
->middleware('guest')
->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
->middleware('guest')
->name('password.update');
});


//Students

Route::middleware('guest')->group(function () {
    Route::get('register', [StudentRegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [StudentRegisteredUserController::class, 'store']);

    Route::get('login', [StudentAuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [StudentAuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [StudentPasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [StudentPasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [StudentNewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [StudentNewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', StudentEmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', StudentVerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [StudentEmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('studentconfirm-password', [StudentConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('studentconfirm-password', [StudentConfirmablePasswordController::class, 'store']);

    Route::put('password', [StudentPasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [StudentAuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

        // Forgot Password
Route::get('/studentforgot-password', [StudentPasswordResetLinkController::class, 'create'])
->middleware('guest')
->name('password.request');

Route::post('/studentforgot-password', [StudentPasswordResetLinkController::class, 'store'])
->middleware('guest')
->name('password.email');

// Reset Password
Route::get('/studentreset-password/{token}', [StudentNewPasswordController::class, 'create'])
->middleware('guest')
->name('password.reset');

Route::post('/studentreset-password', [StudentNewPasswordController::class, 'store'])
->middleware('guest')
->name('password.update');
});