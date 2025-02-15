
  document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.querySelector(".login-form");
    const signupForm = document.querySelector(".signup-form");
    const loginText = document.querySelector(".login-text a");
    const signUpText = document.querySelector(".sign-up-text a");

    // Initially, show only the login form
    loginForm.style.display = "block";
    signupForm.style.display = "none";

    signUpText.addEventListener("click", function (event) {
      event.preventDefault();
      loginForm.style.display = "none";
      signupForm.style.display = "block";
    });

    loginText.addEventListener("click", function (event) {
      event.preventDefault();
      signupForm.style.display = "none";
      loginForm.style.display = "block";
    });
  });

