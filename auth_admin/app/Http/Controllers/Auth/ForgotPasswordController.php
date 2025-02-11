<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
         return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
         $request->validate(['email' => 'required|email']);

         $response = Password::broker('admins')->sendResetLink(
             $request->only('email')
         );

         if ($response == Password::RESET_LINK_SENT) {
             return view('auth.redirect', [
                 'message' => 'Password reset link has been sent to your email.',
                 'target'  => route('login'),
             ]);
         } else {
             return back()->withErrors(['email' => trans($response)]);
         }
    }
}