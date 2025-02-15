document.getElementById("adminLoginForm").addEventListener("submit", function(event) {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    if (email === "" || password === "") {
        alert("Please fill out all fields.");
        event.preventDefault(); // Stop form submission
    }

    if (!email.includes("@")) {
        alert("Please enter a valid email.");
        event.preventDefault();
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("adminLoginForm");
    loginForm.addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        const formData = new FormData(loginForm);

        fetch(loginForm.action, {
            method: "POST",  // Explicitly set to POST
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
            },
            body: formData,
        })
        .then(response => {
            // Check if response is ok and return JSON
            if (!response.ok) {
                // Optionally, handle HTTP errors here
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: "success",
                    title: "Success!",
                    text: data.success,
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                }).then(() => {
                    window.location.href = data.redirect_url;
                });
            } else if (data.error) {
                Swal.fire({
                    icon: "error",
                    title: "Oops!",
                    text: data.error,
                    confirmButtonText: "OK",
                });
            }
        })
        .catch(error => {
            console.error("Error:", error);
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "An unexpected error occurred.",
                confirmButtonText: "OK",
            });
        });
    });
});