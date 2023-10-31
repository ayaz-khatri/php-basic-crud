<!-- The Block Modal -->
<div class="modal fade" id="blockModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
        <form action="#">
            <p id="modalMessage">Are you sure you want to block this <?php echo $singular; ?>?</p>
            <a href="#" id="blockLink" class="btn btn-danger w-25">Yes</a>
            <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
        </form>
        </div>
        <div class="modal-footer"></div>
    </div>
    </div>
</div>

<!-- The Block Selected Modal -->
<div class="modal fade" id="blockSelectedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <form id="blockSelectedForm" method="POST" action="block.php">
                <p id="modalMessage">Are you sure you want to block selected <?php echo $singular; ?>[s]?</p>
                <!-- Hidden input fields to store selected IDs -->
                <input type="hidden" name="selectedIds" id="selectedBlockIds" value="">
                <button type="submit" class="btn btn-danger w-25" name="blockSelected">Yes</button>
                <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
            </form>
        </div>
        <div class="modal-footer"></div>
    </div>
    </div>
</div>

<!-- The Block All Modal -->
<div class="modal fade" id="blockAllModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
        <form action="block.php" method="POST">
            <p id="modalMessage">Are you sure you want to block all <?php echo $plural; ?>?</p>
            <input type="submit" value="Yes" class="btn btn-danger w-25" name="blockAll">
            <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
        </form>
        </div>
        <div class="modal-footer"></div>
    </div>
    </div>
</div>