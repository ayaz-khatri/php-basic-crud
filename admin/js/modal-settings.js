document.addEventListener("DOMContentLoaded", function() {
    var deleteLinks = document.querySelectorAll(".delete");
    var blockLinks = document.querySelectorAll(".block");

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


    function getSelectedIds() {
        var selectedIds = [];
        document.querySelectorAll('#myTable input[type="checkbox"]:checked').forEach(function (checkbox) {
            var id = checkbox.closest('tr').querySelector('td:nth-child(3)').textContent;
            selectedIds.push(id);
        });
        return selectedIds;
    }

    // Event listener for the #deleteSelected
    document.getElementById('deleteSelected').addEventListener('click', function(event) {
        event.preventDefault();

        var selectedIds = getSelectedIds();
        // Populate the hidden input field with selected user IDs
        var selectedIdsInput = document.getElementById('selectedDeleteIds');
        selectedIdsInput.value = selectedIds.join(',');
    });


    // Event listener for the #blockSelected
    document.getElementById('blockSelected').addEventListener('click', function(event) {
        event.preventDefault();

        var selectedIds = getSelectedIds();
        // Populate the hidden input field with selected user IDs
        var selectedIdsInput = document.getElementById('selectedBlockIds');
        selectedIdsInput.value = selectedIds.join(',');
    });

});