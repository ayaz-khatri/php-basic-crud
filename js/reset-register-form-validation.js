// reset the register form validation
function resetValidation() 
{
    const confirmPasswordInput = document.getElementById("floatingConfirmPassword");
    const confirmPasswordFeedback = document.querySelector("#floatingConfirmPassword ~ .invalid-feedback");

    confirmPasswordFeedback.textContent = "Passwords do not match.";
    confirmPasswordInput.classList.remove("is-invalid");
    confirmPasswordInput.setCustomValidity(""); // Reset custom validity when the user starts typing
}