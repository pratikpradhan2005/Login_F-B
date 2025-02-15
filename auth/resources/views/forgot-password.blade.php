<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="{{ asset('css/forgot-reset.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
</head>
<body>
  <div class="container">
    <h2>Forgot Password</h2>
    <form action="{{ route('forgot.password.email') }}" method="POST">
      @csrf
      <div class="input-box">
        <input type="email" name="email" placeholder="Enter your email" required>
      </div>
      <button type="submit">Send Reset Link</button>
    </form>
  </div>

  <script>
    window.onload = function() {
      @if(session('status'))
        Swal.fire({
          title: "Success!",
          text: "{{ session('status') }}",
          icon: "success",
          confirmButtonText: "OK"
        });
      @endif

      @if ($errors->any())
        Swal.fire({
          title: "Error!",
          html: `{!! implode('<br>', $errors->all()) !!}`,
          icon: "error",
          confirmButtonText: "OK"
        });
      @endif
    };
  </script>
</body>
</html>