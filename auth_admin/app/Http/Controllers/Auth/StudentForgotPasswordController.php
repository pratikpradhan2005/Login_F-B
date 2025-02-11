<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class StudentForgotPasswordController extends Controller
{
    /**
     * Display the form to request a password reset link.
     */
    public function showLinkRequestForm()
    {
        // Passing a flag (or you can use $guard) so the view knows it’s for students.
        return view('auth.studentforgot-password', ['isStudent' => true]);
    }

    /**
     * Handle sending the reset link email.
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Use the "students" broker
        $response = Password::broker('students')->sendResetLink(
            $request->only('email')
        );

        return $response === Password::RESET_LINK_SENT
            ? back()->with('status', trans($response))
            : back()->withErrors(['email' => trans($response)]);
    }
}
