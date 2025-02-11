<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class StudentRegisterController extends Controller
{

    
    public function showRegisterForm(){
        return view('Auth.student-register');
    }
    
    public function register(Request $request)
    {
         $request->validate([
             'name'                  => 'required|string|max:255',
             'email'                 => 'required|email|unique:admins,email',
             'password'              => 'required|min:6|confirmed',
         ]);

         $student = Student::create([
             'name'     => $request->name,
             'email'    => $request->email,
             'password' => Hash::make($request->password),
         ]);

         Auth::guard('student')->login($student);

         return view('auth.studentredirect', [
             'message' => 'Registration Successful',
             'target'  => route('student-login'),
         ]);
    }
}