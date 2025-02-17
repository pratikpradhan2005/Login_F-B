<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (localStorage.getItem("showSignup") === "true") {
            localStorage.removeItem("showSignup"); 
            document.getElementById("flip").checked = true; 
        }
    });
</script>

<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="/images/front.webp" alt="">
                <div class="text">
                    <span class="text-1">"A calm mind and an organized seat are the keys to a successful exam of a beginner!"</span>
                </div>
            </div>
            <div class="back">
                <img class="backImg" src="/images/for-second.jpg" alt="">
                <div class="text">
                    <span class="text-1">"In exams, seating arrangements decide your destiny—especially if you rely on your neighbor!"</span>
                    <span class="text-2">Let's get started</span>
                </div>
            </div>
        </div>
        
        <div class="forms">
            <div class="form-content">

                <!-- Login Form -->
                <div class="login-form">
                    <div class="title">Sign In</div>
                    
                    <!-- Show Success or Error Message -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('student-login') }}" method="POST">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="Enter your email" required>
                                @error('email') <small class="error">{{ $message }}</small> @enderror
                            </div>

                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Enter your password" required>
                                @error('password') <small class="error">{{ $message }}</small> @enderror
                            </div>

                            <div class="text"><a href="{{ route('password.request') }}">Forgot password?</a></div>
                            
                            <div class="button input-box">
                                <input type="submit" value="Login">
                            </div>

                            <div class="text sign-up-text">Don't have an account? <label for="flip">Sign Up now</label></div>
                        </div>
                    </form>
                </div>

                <!-- Signup Form -->
                <div class="signup-form">
                    <div class="title">Sign Up</div>

                    <form action="{{ route('student-register') }}" method="POST">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="name" placeholder="Enter your name" required>
                                @error('name') <small class="error">{{ $message }}</small> @enderror
                            </div>

                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="Enter your email" required>
                                @error('email') <small class="error">{{ $message }}</small> @enderror
                            </div>

                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Enter your password" required>
                                @error('password') <small class="error">{{ $message }}</small> @enderror
                            </div>

                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password_confirmation" placeholder="Confirm your password" required>
                            </div>

                            <div class="button input-box">
                                <input type="submit" value="Register">
                            </div>

                            <div class="text sign-up-text">Already have an account? <label for="flip">Sign In now</label></div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
