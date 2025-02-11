<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('Auth.login');
    }
    
  
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

       if(Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admindashboard');
       }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->withInput();
    }

    public function logout()
    {
       Auth::logout();
        return redirect()->route('login');
    }
}
