<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
class StudentRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.student-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:8|confirmed',
        ]);

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('student')->login($student);

        return view('auth.redirect', [
            'message' => 'Registration Successful',
            'target'  => route('student-login'),
        ]);

    }
}
