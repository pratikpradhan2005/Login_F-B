<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery -->
  
  <script>
    function confirmLogout(event) {
      event.preventDefault(); // Prevent default form submission

      Swal.fire({
        title: "Are you sure?",
        text: "You will be logged out.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, Logout",
        cancelButtonText: "No, Stay"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "{{ route('student-logout') }}"; // Redirect after confirmation
        }
      });
    }
  </script>
</head>
<body>
  <h1>Welcome, {{ Auth::guard('student')->user()->name }}</h1>
  <form onsubmit="confirmLogout(event)">
    @csrf
    <button type="submit">Logout</button>
  </form>
</body>
</html>
