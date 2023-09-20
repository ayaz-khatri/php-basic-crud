// toggle password (Hide/Show)
function togglePassword() {
    const passwordInput = document.getElementById("floatingPassword");
    const eyeIcon = document.getElementById("eyeButton");
    if (passwordInput.value != "") {
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
      } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
      }
    }
  }