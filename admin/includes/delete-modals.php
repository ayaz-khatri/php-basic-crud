<!-- The Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
        <form action="#">
            <p id="modalMessage">Are you sure you want to permanantly delete this <?php echo $singular; ?>?</p>
            <a href="#" id="deleteLink" class="btn btn-danger w-25">Yes</a>
            <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
        </form>
        </div>
        <div class="modal-footer"></div>
    </div>
    </div>
</div>

<!-- The Delete Selected Modal -->
<div class="modal fade" id="deleteSelectedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <form id="deleteSelectedForm" method="POST" action="delete.php">
                <p id="modalMessage">Are you sure you want to permanantly delete selected <?php echo $singular; ?>[s]?</p>
                <!-- Hidden input fields to store selected IDs -->
                <input type="hidden" name="selectedIds" id="selectedDeleteIds" value="">
                <button type="submit" class="btn btn-danger w-25" name="deleteSelected">Yes</button>
                <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
            </form>
        </div>
        <div class="modal-footer"></div>
    </div>
    </div>
</div>

<!-- The Delete All Modal -->
<div class="modal fade" id="deleteAllModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
        <form action="delete.php" method="POST">
            <p id="modalMessage">Are you sure you want to permanantly delete all <?php echo $plural; ?>?</p>
            <input type="hidden" name="page" value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
            <input type="submit" class="btn btn-danger w-25" name="deleteAll" value="Yes">
            <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
        </form>
        </div>
        <div class="modal-footer"></div>
    </div>
    </div>
</div>