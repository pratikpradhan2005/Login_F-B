<?php

//Authentication Controller

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Session;
use NunoMaduro\Collision\Adapters\Phpunit\Style;

class StudentAuthController extends Controller
{
    // Show the login/register view
    public function showLoginRegister()
    {
        return view('login-register');
    }

    // Handle student registration
    public function register(Request $request)
{
    // Check if it's an AJAX request
    if ($request->ajax()) {
        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'name' => [
                'required', 'min:3', 'max:50',
                'regex:/^([A-Z][a-z]+)(\s[A-Z][a-z]+)*$/', // First letter capital, minimum 3 characters
            ],
            'email' => 'required|email|unique:students',
            'password' => [
                'required', 'min:8', 'max:20',
                'regex:/^[A-Za-z][A-Za-z0-9@#$%^&*!]{7,}$/', // Starts with a letter, contains letters, digits, special chars
            ],
        ], [
            // Custom error messages
            'name.required' => 'Name is required.',
            'name.regex' => 'Name must start with a capital letter, contain only letters, and have at least 3 characters per word.',

            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',

            'password.required' => 'Password is required.',
            'password.regex' => 'Password must start with a letter and be at least 8 characters long, including letters, digits, and special characters.',
        ]);

        // If validation fails, return JSON error response
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ], 422);
        }

        // Create the student
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'success' => 'Registration Successful! Please Login',
            'redirect_url' => route('student-login')
        ]);
    }

    // Handle non-AJAX requests (form submission)
    $validator = Validator::make($request->all(), [
        'name' => [
            'required', 'min:3', 'max:50',
            'regex:/^([A-Z][a-z]+)(\s[A-Z][a-z]+)*$/',
        ],
        'email' => 'required|email|unique:students',
        'password' => [
            'required', 'min:8', 'max:20',
            'regex:/^[A-Za-z][A-Za-z0-9@#$%^&*!]{7,}$/',
        ],
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Create student
    Student::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('student-login')->with('success', 'Registration successful! Please login.');
}
    // Handle student login
    public function login(Request $request)
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
        if (Auth::guard('student')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
    
            // If AJAX request, return JSON success response
            if ($request->ajax()) {
                return response()->json([
                    'success' => 'Login Successful!',
                    'redirect_url' => route('student-dashboard') // Change as needed
                ]);
            }
    
            // Redirect if not AJAX
            return redirect()->route('student-dashboard');
        }
    
        // Handle failed login
        if ($request->ajax()) {
            return response()->json(['error' => 'Invalid credentials. Please try again.'], 401);
        }
    
        return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
    }
    // Display the student dashboard
    public function dashboard()
    {
        return view('student-dashboard');
    }

    // Log out the student
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        return redirect()->route('welcome');
    }

    // Display the forgot password form
    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    // Handle sending the password reset link
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $student = Student::where('email', $request->email)->first();
        if (!$student) {
            return back()->withErrors(['email' => 'No student found with that email address.']);
        }

        // Generate a token and store it in the password_resets table
        $token = Str::random(60);
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'token'      => $token, // storing as plain token for simplicity
                'created_at' => Carbon::now()
            ]
        );

        // Generate the reset link
        $resetLink = route('reset.password.form', ['token' => $token]);

        // Send email (adjust the Mail settings in your .env file accordingly)
        Mail::raw("Click here to reset your password: $resetLink", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Reset Your Password');
        });

        return back()->with('status', 'We have emailed your password reset link!');
    }

    // Display the reset password form (the email field is pre-populated)
    public function showResetForm($token)
    {
        // Look up the token record
        $passwordReset = DB::table('password_resets')->where('token', $token)->first();

        if (!$passwordReset) {
            return redirect()->route('login.register')->withErrors(['Invalid or expired token.']);
        }

        return view('reset-password', ['token' => $token, 'email' => $passwordReset->email]);
    }

    // Handle resetting the password
    public function resetPassword(Request $request)
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
            'token'    => 'required'
        ]);
    
        // Retrieve the token record for the provided email
        $passwordReset = DB::table('password_resets')
            ->where('token', $request->token)
            ->where('email', $request->email)
            ->first();
    
        if (!$passwordReset) {
            return response()->json(['error' => 'Invalid token or email.'], 400);
        }
    
        // Check if the token is expired (valid for 60 minutes)
        if (Carbon::parse($passwordReset->created_at)->addMinutes(10)->isPast()) {
            DB::table('password_resets')->where('email', $request->email)->delete();
            return response()->json(['error' => 'This password reset token has expired.'], 400);
        }
    
        // Find the student record
        $student = Student::where('email', $request->email)->first();
        if (!$student) {
            return response()->json(['error' => 'No student found with that email address.'], 400);
        }
    
        // Update the student’s password
        $student->password = Hash::make($request->password);
        $student->save();
    
        // Delete the password reset token
        DB::table('password_resets')->where('email', $request->email)->delete();
    
        // Return JSON response instead of redirecting
        return response()->json(['success' => 'Password has been reset successfully.', 'redirect' => route('login')]);
    }
    
}
