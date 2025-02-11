<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentAuthController extends Controller
{
   public function showLoginForm()
   {
    return view('auth.student-login');
   }

   public function login(Request $request)
   {
       $credentials = $request->only('email', 'password');

      if(Auth::guard('student')->attempt($credentials)) {
           return redirect()->route('studentdashboard');
      }

       return back()->withErrors([
           'email' => 'The provided credentials do not match our records.'
       ])->withInput();
   }
   public function logout()
   {
      Auth::logout();
       return redirect()->route('student-login');
   }
}

