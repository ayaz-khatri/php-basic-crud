document.addEventListener("DOMContentLoaded", function() {

var deleteLinks = document.querySelectorAll(".delete");
deleteLinks.forEach(function(link) {
    link.addEventListener("click", function(event) {
        event.preventDefault();
        var id = this.getAttribute("data-id");
        var deleteLink = document.getElementById("deleteLink");

        // Set the "Delete" link's href dynamically
        deleteLink.href = 'delete.php?id=' + id;

        // Show the modal
        var deleteModal = document.getElementById("deleteModal");
        var modal = new bootstrap.Modal(deleteModal);
        modal.show();
    });
});

/* ----------------------------------- block / unblock ---------------------------------- */

var blockLinks = document.querySelectorAll(".block");
blockLinks.forEach(function(link) {
    link.addEventListener("click", function(event) {
        event.preventDefault();
        var id = this.getAttribute("data-id");
        var blockLink = document.getElementById("blockLink");

        // Set the "Block" link's href dynamically
        blockLink.href = 'block.php?id=' + id;

        // Show the modal
        var blockModal = document.getElementById("blockModal");
        var modal = new bootstrap.Modal(blockModal);
        modal.show();
    });
});

var unblockLinks = document.querySelectorAll(".unblock");
unblockLinks.forEach(function(link) {
    link.addEventListener("click", function(event) {
        event.preventDefault();
        var id = this.getAttribute("data-id");
        var unblockLink = document.getElementById("unblockLink");

        // Set the "Block" link's href dynamically
        unblockLink.href = 'unblock.php?id=' + id;

        // Show the modal
        var unblockModal = document.getElementById("unblockModal");
        var modal = new bootstrap.Modal(unblockModal);
        modal.show();
    });

/* ----------------------------------- block / unblock ---------------------------------- */

});


function getSelectedIds() 
{
    var selectedIds = [];
    var checkboxes = document.querySelectorAll('#myTable input[type="checkbox"]');
    var allChecked = true; // Assume all rows are checked initially

    // Find the index of the "ID" column
    var idColumnIndex = -1;
    var headers = document.querySelectorAll('#myTable th');
    for (var i = 0; i < headers.length; i++) {
        if (headers[i].textContent.trim() === 'Name') {
            idColumnIndex = i;
            break;
        }
    }

    checkboxes.forEach(function (checkbox, index) {
        if (index === 0 && checkbox.checked) {
            allChecked = true;
            return;
        }

        if (!checkbox.checked) {
            allChecked = false; // If any checkbox is not checked, set allChecked to false
        } else {
            var row = checkbox.closest('tr');
            var cells = row.querySelectorAll('td');
            var nameCell = cells[idColumnIndex];
            var span = nameCell.querySelector('span');
            if (span) {
                selectedIds.push(span.textContent);
            }
        }
    });
    return selectedIds;
}



// Event listener for the #deleteSelected
document.getElementById('deleteSelected').addEventListener('click', function(event) {
    event.preventDefault();

    var selectedIds = getSelectedIds();
    // Populate the hidden input field with selected IDs
    var selectedIdsInput = document.getElementById('selectedDeleteIds');
    selectedIdsInput.value = selectedIds.join(',');
});


/* ----------------------------------- block / unblock ---------------------------------- */
var path = window.location.pathname;
var page = path.split("/").pop();
if(page == "blocked.php")
{
    // Event listener for the #unblockSelected
    document.getElementById('unblockSelected').addEventListener('click', function(event) {
        event.preventDefault();

        var selectedIds = getSelectedIds();
        // Populate the hidden input field with selected IDs
        var selectedIdsInput = document.getElementById('selectedUnblockIds');
        selectedIdsInput.value = selectedIds.join(',');
    });
}
else
{
    // Event listener for the #blockSelected
    document.getElementById('blockSelected').addEventListener('click', function(event) {
        event.preventDefault();

        var selectedIds = getSelectedIds();
        // Populate the hidden input field with selected IDs
        var selectedIdsInput = document.getElementById('selectedBlockIds');
        selectedIdsInput.value = selectedIds.join(',');
    });
}
/* ----------------------------------- block / unblock ---------------------------------- */

});