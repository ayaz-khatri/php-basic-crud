// Function to show buttons by removing the 'icon-button' class
function showButtons() {
    const buttons = document.querySelectorAll(".icon-button");
    buttons.forEach(function(button) {
        button.classList.remove("icon-button");
    });
}

// Wait for the Font Awesome icons to load
window.addEventListener("load", function() {
    showButtons(); // Show buttons on initial page load

    // Listen for the 'draw' event to show buttons on each page change
    dataTable.on('draw', function() {
        showButtons();
    });
});
