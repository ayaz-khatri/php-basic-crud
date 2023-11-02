<div class="tableOptions">
    <div class="btn-group btn-group-sm">
        <a type="button" class="btn btn-success" href="<?php echo $_SERVER['PHP_SELF'] ?>" id="refreshButton">Refresh</a>
    </div>

    <?php 
        $page = basename($_SERVER['PHP_SELF']);

        if($page == "index.php")
        { ?>

            <!-- Block selected/all Button -->
            <div class="btn-group btn-group-sm">
                <a href="#" type="button" class="btn btn-warning disabled" id="blockSelected"
                data-bs-toggle="modal" data-bs-target="#blockSelectedModal">Block</a>
                <a type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown">
                <span class="visually-hidden">Toggle Dropdown</span>
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item small" href="#" id="blockAll" data-bs-toggle="modal"
                    data-bs-target="#blockAllModal">Block All</a></li>
                </ul>
            </div>

        <?php }

        elseif($page == "blocked.php")
        { ?>

            <!-- unblock selected/all Button -->
            <div class="btn-group btn-group-sm">
                <a href="#" type="button" class="btn btn-warning disabled" id="unblockSelected"
                data-bs-toggle="modal" data-bs-target="#unblockSelectedModal">Unblock</a>
                <a type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown">
                <span class="visually-hidden">Toggle Dropdown</span>
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item small" href="#" id="unblockAll" data-bs-toggle="modal"
                    data-bs-target="#unblockAllModal">Unblock All</a></li>
                </ul>
            </div>

        <?php }
    
    ?>

    <!-- Delete selected/all Button -->
    <div class="btn-group btn-group-sm">
        <a type="button" href="#" class="btn btn btn-danger disabled" id="deleteSelected"
        data-bs-toggle="modal" data-bs-target="#deleteSelectedModal">Delete</a>
        <a type="button" class="btn btn btn-danger dropdown-toggle dropdown-toggle-split"
        data-bs-toggle="dropdown">
        <span class="visually-hidden">Toggle Dropdown</span>
        </a>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item small" href="#" id="deleteAll" data-bs-toggle="modal"
            data-bs-target="#deleteAllModal">Delete All</a></li>
        </ul>
    </div>

</div>