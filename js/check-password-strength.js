// function to check password strength (very weak, weak, good, strong, very strong)
function checkPasswordStrength() {
    const password = document.getElementById("floatingPassword").value;
    const strengthBarDiv = document.getElementById("progressBarDiv");
    const strengthBar = document.getElementById("passwordStrengthBar");
    const strengthMessage = document.getElementById("passwordStrengthMessage");

    // Regular expressions to check for different criteria
    const hasSmallAlphabet = /[a-z]/.test(password);
    const hasCapitalAlphabet = /[A-Z]/.test(password);
    const hasSpecialCharacter = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password);
    const hasNumber = /\d/.test(password);
    const isLengthValid = password.length >= 8;

    // Calculate password strength
    let strength = 0;
    strength += hasSmallAlphabet ? 1 : 0;
    strength += hasCapitalAlphabet ? 1 : 0;
    strength += hasSpecialCharacter ? 1 : 0;
    strength += hasNumber ? 1 : 0;
    strength += isLengthValid ? 1 : 0;

    // Update progress bar and message
    const totalCriteria = 5; // Total number of criteria
    var strengthPercentage = (strength / totalCriteria) * 100;
    if (password.length === 0) {
      strengthMessage.style.display = "none";
    } else {
      strengthMessage.style.display = "flex";
    }
    if (password.length < 8 && password.length > 0) {
      strengthPercentage = 20;
    }
    strengthBar.style.width = strengthPercentage + "%";

    // Set password strength message

    if (strengthPercentage <= 20) {
      strengthMessage.textContent = "Very Weak";
      strengthBar.classList.remove("bg-success", "bg-warning", "bg-info");
      strengthBar.classList.add("bg-danger");
    } else if (strengthPercentage <= 40) {
      strengthMessage.textContent = "Weak";
      strengthBar.classList.remove("bg-success", "bg-danger", "bg-info");
      strengthBar.classList.add("bg-warning");
    } else if (strengthPercentage <= 60) {
      strengthMessage.textContent = "Good";
      strengthBar.classList.remove("bg-success", "bg-danger", "bg-warning");
      strengthBar.classList.add("bg-info");
    } else if (strengthPercentage <= 80) {
      strengthMessage.textContent = "Strong";
      strengthBar.classList.remove("bg-info", "bg-danger", "bg-warning");
      strengthBar.classList.add("bg-success");
    } else {
      strengthMessage.textContent = "Very Strong";
      strengthBar.classList.remove("bg-info", "bg-warning", "bg-success", "bg-danger");
      strengthBar.classList.add("bg-success");
    }

  }