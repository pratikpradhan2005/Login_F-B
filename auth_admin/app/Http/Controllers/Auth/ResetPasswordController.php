<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
         return view('auth.reset-password', [
             'token' => $token,
             'email' => $request->email,
             'request' => $request
         ]);
    }

    public function reset(Request $request , $token = null)
    {
         $request->validate([
             'token'                 => 'required',
             'email'                 => 'required|email',
             'password'              => 'required|min:6|confirmed',
         ]);

         $response = Password::broker('admins')->reset(
             $request->only('email', 'password', 'password_confirmation', 'token'),
             function ($admin, $password) {
                 $admin->password = Hash::make($password);
                 $admin->setRememberToken(Str::random(60));
                 $admin->save();
                 event(new PasswordReset($admin));
             }
         );

         if ($response == Password::PASSWORD_RESET) {
             return view('auth.redirect', [
                 'message' => 'Password has been reset successfully.',
                 'target'  => route('login'),
             ]);
         } else {
             return back()->withErrors(['email' => [trans($response)]]);
         }
    }
}