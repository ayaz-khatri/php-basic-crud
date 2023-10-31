<!-- The Unblock Modal -->
<div class="modal fade" id="unblockModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
        <form action="#">
            <p id="modalMessage">Are you sure you want to unblock this <?php echo $singular; ?>?</p>
            <a href="#" id="unblockLink" class="btn btn-danger w-25">Yes</a>
            <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
        </form>
        </div>
        <div class="modal-footer"></div>
    </div>
    </div>
</div>

<!-- The Unblock Selected Modal -->
<div class="modal fade" id="unblockSelectedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <form id="unblockSelectedForm" method="POST" action="unblock.php">
                <p id="modalMessage">Are you sure you want to unblock selected <?php echo $singular; ?>[s]?</p>
                <!-- Hidden input fields to store selected IDs -->
                <input type="hidden" name="selectedIds" id="selectedUnblockIds" value="">
                <button type="submit" class="btn btn-danger w-25" name="unblockSelected">Yes</button>
                <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
            </form>
        </div>
        <div class="modal-footer"></div>
    </div>
    </div>
</div>

<!-- The Unblock All Modal -->
<div class="modal fade" id="unblockAllModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
        <form action="unblock.php" method="POST">
            <p id="modalMessage">Are you sure you want to unblock all <?php echo $plural; ?>?</p>
            <input type="submit" value="Yes" class="btn btn-danger w-25" name="unblockAll">
            <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
        </form>
        </div>
        <div class="modal-footer"></div>
    </div>
    </div>
</div>
