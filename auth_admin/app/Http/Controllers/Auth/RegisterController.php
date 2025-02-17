<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    
    public function showRegisterForm(){
        return view('Auth.register');
    }
    
    public function register(Request $request)
    {
         $request->validate([
             'name'                  => 'required|string|max:255',
             'email'                 => 'required|email|unique:admins,email',
             'password'              => 'required|min:6|confirmed',
         ]);

         $admin = Admin::create([
             'name'     => $request->name,
             'email'    => $request->email,
             'password' => Hash::make($request->password),
         ]);

         Auth::guard('admin')->login($admin);

         return view('auth.redirect', [
             'message' => 'Registration Successful',
             'target'  => route('login'),
         ]);
    }
}