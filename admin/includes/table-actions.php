<td>

    <?php 
        $page = basename($_SERVER['PHP_SELF']);

        if($page == "index.php")
        { ?>

            <a href="view.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-sm p-1 px-2 icon-button" id="btnView">
            <i class="fa fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="View"></i>
            </a>
            <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm p-1 px-2 icon-button" id="btnEdit">
            <i class="fa fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
            </a>
            <a href="#" class="block btn btn-warning btn-sm p-1 px-2 icon-button" data-id=<?php echo $row['id'] ?>>
            <i class="fa fa-lock" data-bs-toggle="tooltip" data-bs-placement="top" title="Block"></i>
            </a>
            <a href="#" class="delete btn btn-danger btn-sm p-1 px-2 icon-button" data-id=<?php echo $row['id'] ?>>
            <i class="fa fa-times-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
            </a>

        <?php }

        elseif($page == "blocked.php")
        { ?>

            <a href="view.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-sm p-1 px-2 icon-button" id="btnView">
            <i class="fa fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="View"></i>
            </a>
            <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm p-1 px-2 icon-button" id="btnEdit">
            <i class="fa fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
            </a>
            <a href="#" class="unblock btn btn-warning btn-sm p-1 px-2 icon-button" data-id=<?php echo $row['id'] ?>>
            <i class="fa-solid fa-lock-open" data-bs-toggle="tooltip" data-bs-placement="top" title="Unblock"></i>
            </a>
            <a href="#" class="delete btn btn-danger btn-sm p-1 px-2 icon-button" data-id=<?php echo $row['id'] ?>>
            <i class="fa fa-times-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
            </a>

        <?php }
    
    ?>

</td>