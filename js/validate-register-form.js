// Register form validation
function validateForm() {
    const form = document.querySelector(".needs-validation");
    const passwordInput = document.getElementById("floatingPassword");
    const confirmPasswordInput = document.getElementById("floatingConfirmPassword");
    const confirmPasswordFeedback = document.querySelector("#floatingConfirmPassword ~ .invalid-feedback");
    const confirmPasswordValidFeedback = document.querySelector("#floatingConfirmPassword ~ .valid-feedback");

    // Check if passwords match
    if (!checkPasswordsMatch()) {
        confirmPasswordInput.setCustomValidity("Passwords do not match.");
        return false;
    } else {
        confirmPasswordInput.setCustomValidity(""); // Reset custom validity when passwords match

        // Check password strength
        const strengthBar = document.getElementById("passwordStrengthBar");
        const strengthPercentage = parseFloat(strengthBar.style.width);

        if (strengthPercentage < 80) {
            passwordInput.setCustomValidity("You need at least a strong password.");
            return false;
        } else {
            passwordInput.setCustomValidity("");
        }
    }
  }