
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password</title>
  <link rel="stylesheet" href="{{ asset('css/forgot-reset.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery for AJAX -->
</head>
<body>
  <div class="container">
    <h2>Reset Password</h2>

    <form id="resetPasswordAdminForm">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="input-box">
        <input type="email" name="email" value="{{ $email }}" readonly>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Enter new password" required>
      </div>
      <div class="input-box">
        <input type="password" name="password_confirmation" placeholder="Confirm new password" required>
      </div>
      <button type="submit">Reset Password</button>
    </form>
  </div>

  <script>
    $(document).ready(function () {
        $("#resetPasswordAdminForm").submit(function (event) {
            event.preventDefault(); // Prevent default form submission

            $.ajax({
                url: "{{ route('admin.reset.password') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        title: "Success!",
                        text: response.success,
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = response.redirect; // Redirect after clicking OK
                        }
                    });
                },
                error: function (xhr) {
                    let errorMessage = "Something went wrong!";
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        errorMessage = xhr.responseJSON.error;
                    }

                    Swal.fire({
                        title: "Error!",
                        text: errorMessage,
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            });
        });
    });
  </script>

</body>
</html>
