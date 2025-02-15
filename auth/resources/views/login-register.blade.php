<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login and Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/login-student.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <div class="container">
      <div class="forms">
        <div class="form-content">
          <!-- LOGIN FORM -->
          <div class="login-form" id="loginForm">
            <div class="title">Student Login</div>
            <form action="{{ route('student-login') }}" method="POST">
              @csrf
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="email" placeholder="Enter your email" required />
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="Enter your password" required />
                </div>
                <div class="text">
                  <a href="{{ route('forgot.password.form') }}">Forgot password?</a>
                </div>
                <div class="button input-box">
                  <input type="submit" value="Submit" />
                </div>
                <div class="text sign-up-text">
                  Don't have an account?
                  <a href="student-register" id="showRegister">Register</a>
                </div>
              </div>
            </form>
          </div>
          <!-- END LOGIN FORM -->

          <!-- SIGNUP FORM -->
          <div class="signup-form" id="registerForm">
            <div class="title">Student Register</div>
            <form action="{{ route('student-register') }}" method="POST">
              @csrf
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input type="text" name="name" placeholder="Enter your name" required />
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="email" placeholder="Enter your email" required />
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="Enter your password" required />
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password_confirmation" placeholder="Confirm your password" required />
                </div>
                <div class="button input-box">
                  <input type="submit" value="Submit" />
                </div>
                <div class="text sign-up-text">
                  Already have an account?
                  <a href="student-login" id="showLogin">Login</a>
                </div>
              </div>
            </form>
          </div>
          <!-- END SIGNUP FORM -->
        </div>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
          const loginForm = document.getElementById("loginForm");
          const registerForm = document.getElementById("registerForm");
          const showRegister = document.getElementById("showRegister");
          const showLogin = document.getElementById("showLogin");

          // Show login by default
          registerForm.style.display = "none";

          showRegister.addEventListener("click", function (e) {
              e.preventDefault();
              loginForm.style.display = "none";
              registerForm.style.display = "block";
          });

          showLogin.addEventListener("click", function (e) {
              e.preventDefault();
              registerForm.style.display = "none";
              loginForm.style.display = "block";
          });
      });
    </script>
  </body>
</html>
