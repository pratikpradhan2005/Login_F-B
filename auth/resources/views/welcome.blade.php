<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery -->
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f4f4f4;
      font-family: Arial, sans-serif;
      margin: 0;
    }
    .container {
      text-align: center;
      background: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      width: 40%;
    }
    h1 {
      margin-bottom: 20px;
    }
    .btn {
      display: inline-block;
      width: 200px;
      padding: 15px;
      margin: 10px;
      font-size: 16px;
      font-weight: bold;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      text-transform: uppercase;
    }
    .btn-admin {
      background-color: #007bff;
      color: white;
    }
    .btn-student {
      background-color: #28a745;
      color: white;
    }
    .btn:hover {
      opacity: 0.8;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Do you want to Login or Register as?</h1>
    <button class="btn btn-admin" onclick="showAdminOptions()">Admin</button>
    <button class="btn btn-student" onclick="showStudentOptions()">Student</button>
  </div>

  <script>
    function showStudentOptions() {
      Swal.fire({
        title: "Student Login/Register",
        text: "Click below to proceed.",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Proceed",
        cancelButtonText: "Cancel",
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "{{ route('login') }}"; // Redirect to student login/register page
        }
      });
    }
      function showAdminOptions() {
      Swal.fire({
        title: "Admin Login",
        text: "Click below to proceed.",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Proceed",
        cancelButtonText: "Cancel",
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "{{ route('admin.login') }}"; // Redirect to student login/register page
        }
      });
    }
  </script>
</body>
</html>
