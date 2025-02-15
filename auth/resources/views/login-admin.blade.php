<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/login-admin.css') }}"> 
   
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <div class="login-container">
        <form id="adminLoginForm" class="login-form" method="POST" action="{{ route('admin.login') }}">
            @csrf 
            <h2>Admin Login</h2>
            
            <div class="input-group">
                <input type="email" id="email" name="email" required>
                <label for="email">Email</label>
            </div>
            
            <div class="input-group">
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
            </div>
            
            <button type="submit">Login</button>
            
            <a href="{{ route('admin.forgot.password.form') }}" class="forgot-password">Forgot Password?</a>
        </form>
    </div>
    
    <script src="{{ asset('JS/login-admin.js') }}"></script> 

   
</body>
</html>
