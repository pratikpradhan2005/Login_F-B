<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class StudentResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
         return view('auth.studentreset-password', [
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

         $response = Password::broker('students')->reset(
             $request->only('email', 'password', 'password_confirmation', 'token'),
             function ($student, $password) {
                 $student->password = Hash::make($password);
                 $student->setRememberToken(Str::random(60));
                 $student->save();
                 event(new PasswordReset($student));
             }
         );

         if ($response == Password::PASSWORD_RESET) {
             return view('auth.studentredirect', [
                 'message' => 'Password has been reset successfully.',
                 'target'  => route('student-login'),
             ]);
         } else {
             return back()->withErrors(['email' => [trans($response)]]);
         }
    }
}