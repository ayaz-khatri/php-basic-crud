// Wait for the Font Awesome icons to load
window.addEventListener("load", function() {
    // Show the buttons by removing the 'icon-button' class
    const buttons = document.querySelectorAll(".icon-button");
    buttons.forEach(function(button) {
    button.classList.remove("icon-button");
    });
});