<?php
    include('../../logics/init-session.php'); // start session if it's not already started
    include('../logics/check-if-not-admin.php'); // check if user is not admin
    include('../../logics/db.php'); // database connection
	$obj = new db(); // create new object of db class
    $datatable = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Users</title>
    <?php include('../includes/head-contents.php'); ?>
</head>

<body>

    <?php include('../includes/admin-navbar.php'); ?>
    <?php include('../includes/admin-sidebar.php'); ?>
    <div class="container my-4">
        <div class="row px-2">
            <div class="col-6">
                <h2 class="text-danger fw-bold">Users</h2>
            </div>
            <div class="col-6 text-end">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="create.php" type="button" class="btn btn-sm btn-outline-secondary">Create User</a>
                    <a href="blocked.php" type="button" class="btn btn-sm btn-outline-danger">Blocked Users</a>
                </div>
            </div>
        </div>
        <hr class="text-danger opacity-100 my-0">
    </div>
    
    <?php include('../../includes/messages.php'); ?>
    
    <div class="container">
        <div class="row">
        <div class="col">
            <h5 class="mb-3">All Users</h5>
            <div id="crudTable">
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="myTable">
                <thead>
                    <tr>
                    <th><input type="checkbox" name="checkbox" id="checkAll"></th>
                    <th>Image</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th class="actionColumn">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                $paramList = [];
                $sql = "SELECT * FROM users WHERE user_role = 'u' AND user_status = 1 ORDER BY user_id DESC";
                $result = $obj->executeSQL($sql, $paramList , true);
                foreach($result as $res) { 
                    ?>
                
                    <tr>
                    <td><input type="checkbox" name="checkbox"></td>
                    <?php $img = empty($res['user_image']) ? "../../images/placeholder.png" : "../uploads/users/" . $res['user_image']?>
                    <td><img src="<?php echo $img ?>" alt="image" class="crtudTableImage"></td>
                    <td><?php echo $res["user_id"] ?></td>
                    <td><?php echo $res["user_name"] ?></td>
                    <td><?php echo $res["user_email"] ?></td>
                    <td><?php echo date('Y-M-d | h:i:s A', strtotime($res["created_at"])) ?></td>
                    <td><?php echo date('Y-M-d | h:i:s A', strtotime($res["updated_at"])) ?></td>
                    <td>
                        <a href="view.php?id=<?php echo $res['user_id'] ?>" class="btn btn-success btn-sm" id="btnView">
                        <i class="fa fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="View"></i>
                        </a>
                        |
                        <a href="edit.php?id=<?php echo $res['user_id'] ?>" class="btn btn-primary btn-sm" id="btnEdit">
                        <i class="fa fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                        </a>
                        |
                        <a href="#" class="block btn btn-warning btn-sm" data-id=<?php echo $res['user_id'] ?>>
                        <i class="fa fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="top" title="Block"></i>
                        </a>
                        |
                        <a href="#" class="delete btn btn-danger btn-sm" data-id=<?php echo $res['user_id'] ?>>
                        <i class="fa fa-times-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                        </a>
                    </td>
                    </tr>
                <?php }?>
                    
                </tbody>
                </table>

                <div class="tableOptions">
                    <div class="btn-group btn-group-sm">
                        <a type="button" class="btn btn-success" href="<?php echo $_SERVER['PHP_SELF'] ?>" id="refreshButton">Refresh</a>
                    </div>
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
                    <hr>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

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
                <p id="modalMessage">Are you sure you want to permanantly delete this user?</p>
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
                <form id="deleteSelectedForm" method="POST" action="delete-selected.php">
                    <p id="modalMessage">Are you sure you want to permanantly delete selected user[s]?</p>
                    <!-- Hidden input fields to store selected IDs -->
                    <input type="hidden" name="selectedIds" id="selectedDeleteIds" value="">
                    <button type="submit" class="btn btn-danger w-25">Yes</button>
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
            <form action="#">
                <p id="modalMessage">Are you sure you want to permanantly delete all users?</p>
                <a href="delete-all.php" class="btn btn-danger w-25">Yes</a>
                <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
            </form>
            </div>
            <div class="modal-footer"></div>
        </div>
        </div>
    </div>

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
                <p id="modalMessage">Are you sure you want to block this user?</p>
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
                <form id="blockSelectedForm" method="POST" action="block-selected.php">
                    <p id="modalMessage">Are you sure you want to block selected user[s]?</p>
                    <!-- Hidden input fields to store selected IDs -->
                    <input type="hidden" name="selectedIds" id="selectedBlockIds" value="">
                    <button type="submit" class="btn btn-danger w-25">Yes</button>
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
            <form action="#">
                <p id="modalMessage">Are you sure you want to block all users?</p>
                <a href="block-all.php" class="btn btn-danger w-25">Yes</a>
                <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
            </form>
            </div>
            <div class="modal-footer"></div>
        </div>
        </div>
    </div>


    <script>
    /*--------------------------
      Data Table
    ---------------------------*/
    // Initialize DataTable
    var dataTable = new DataTable(document.querySelector('#myTable'), {
      columnDefs: [
        {
          targets: [0, 1, 7], // column index (start from 0)
          orderable: false, // set orderable false for selected columns
        },
      ],
      order: [[2, 'desc']],
    });

    </script>
    <script src="../js/check-boxes.js"></script>
    <script src="../js/modal-settings.js"></script>
    <?php include('../../includes/footer.php'); ?>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>

</html>