<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use DB;
class AdminAuthController extends Controller

{

    public function showLoginAdminForm()
    {
        return view('login-admin');
    }
    public function loginAdmin(Request $request)
    {
        // Validate login input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email address.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
        ]);
    
        // Handle validation errors
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['error' => $validator->errors()->first()], 422);
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Attempt login
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
    
            // If AJAX request, return JSON success response
            if ($request->ajax()) {
                return response()->json([
                    'success' => 'Login Successful!',
                    'redirect_url' => route('admin-dashboard') // Change as needed
                ]);
            }
    
            // Redirect if not AJAX
            return redirect()->route('admin-dashboard');
        }
    
        // Handle failed login
        if ($request->ajax()) {
            return response()->json(['error' => 'Invalid credentials. Please try again.'], 401);
        }
    
        return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
    }

    public function admindashboard()
    {
        return view('admin-dashboard');
    }

public function adminlogout(Request $request)
{
    Auth::guard('admin')->logout();
    return redirect()->route('welcome');
}


public function showForgotPasswordAdminForm()
{
    return view('admin-forgot-password');
}


public function sendResetLinkAdminEmail(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $admin = Admin::where('email', $request->email)->first();
    if (!$admin) {
        return back()->withErrors(['email' => 'No admin found with that email address.']);
    }

    // Generate a token and store it in the password_resets table
    $token = Str::random(60);
    DB::table('admin_password_resets')->updateOrInsert(
        ['email' => $request->email],
        [
            'token'      => $token, // storing as plain token for simplicity
            'created_at' => Carbon::now()
        ]
    );

    $resetLink = route('admin.reset.password.form', ['token' => $token]);

    // Send email (adjust the Mail settings in your .env file accordingly)
    Mail::raw("Click here to reset your password: $resetLink", function ($message) use ($request) {
        $message->to($request->email)
                ->subject('Reset Your Password');
    });

    return back()->with('status', 'We have emailed your password reset link!');
}

public function showResetAdminForm($token)
    {
        // Look up the token record
        $passwordReset = DB::table('admin_password_resets')->where('token', $token)->first();

        if (!$passwordReset) {
            return redirect()->route('admin.login')->withErrors(['Invalid or expired token.']);
        }

        return view('admin-reset-password', ['token' => $token, 'email' => $passwordReset->email]);
    }

    public function resetPasswordAdmin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'regex:/^[A-Za-z][A-Za-z0-9@#$%^&*!]{7,}$/',
                'confirmed'
            ],
            'token'    => 'required',

            
            'password.regex' => 'Password must start with a letter and be at least 8 characters long, including letters, digits, and special characters.',
            'password.min' => 'Password length should be greater 8.',
        ]);
    
        // Retrieve the token record for the provided email
        $passwordReset = DB::table('admin_password_resets')
            ->where('token', $request->token)
            ->where('email', $request->email)
            ->first();
    
        if (!$passwordReset) {
            return response()->json(['error' => 'Invalid token or email.'], 400);
        }
    
        // Check if the token is expired (valid for 60 minutes)
        if (Carbon::parse($passwordReset->created_at)->addMinutes(10)->isPast()) {
            DB::table('admin_password_resets')->where('email', $request->email)->delete();
            return response()->json(['error' => 'This password reset token has expired.'], 400);
        }
    
        // Find the student record
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return response()->json(['error' => 'No Admin found with that email address.'], 400);
        }
    
        // Update the student’s password
        $admin->password = Hash::make($request->password);
        $admin->save();
    
        // Delete the password reset token
        DB::table('admin_password_resets')->where('email', $request->email)->delete();
    
        // Return JSON response instead of redirecting
        return response()->json(['success' => 'Password has been reset successfully.', 'redirect' => route('admin.login')]);
    }

}