// Function to check if the passwords match
function checkPasswordsMatch() {
    const password = document.getElementById("floatingPassword").value;
    const confirmPassword = document.getElementById("floatingConfirmPassword").value;
    if (confirmPassword != "") {
      if (password !== confirmPassword) {
        const confirmPasswordFeedback = document.querySelector("#floatingConfirmPassword ~ .invalid-feedback");
        const confirmPasswordValidFeedback = document.querySelector("#floatingConfirmPassword ~ .valid-feedback");

        // Show error message for confirm password field
        confirmPasswordFeedback.style.display = "block";
        confirmPasswordValidFeedback.style.display = "none";
        return false;
      }

      const confirmPasswordFeedback = document.querySelector("#floatingConfirmPassword ~ .invalid-feedback");
      const confirmPasswordValidFeedback = document.querySelector("#floatingConfirmPassword ~ .valid-feedback");

      confirmPasswordFeedback.style.display = "none";
      confirmPasswordValidFeedback.style.display = "block";
      return true;
    }
  }