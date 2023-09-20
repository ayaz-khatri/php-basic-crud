<?php
    include('../logics/init-session.php'); // start session if it's not already started
    include('logics/check-if-not-admin.php'); // check if user is not admin
    include('../logics/db.php'); // database connection
	$obj = new db(); // create new object of db class
    $datatable = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Users</title>
    <?php include('includes/head-contents.php'); ?>
</head>

<body>

    <?php include('includes/admin-navbar.php'); ?>
    <?php include('includes/admin-sidebar.php'); ?>
    <div class="container my-5">
        <div class="row px-2">
            <div class="col-6">
                <h2 class="text-danger fw-bold">Users</h2>
            </div>
            <div class="col-6 text-end">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="add-user.php" type="button" class="btn btn-sm btn-outline-secondary">Add New User</a>
                    <!-- <a href="#" type="button" class="btn btn-sm btn-outline-danger">Blocked Users</a> -->
                </div>
            </div>
        </div>
        <hr class="text-danger opacity-100 my-0">
    </div>

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
                $sql = "SELECT * FROM users WHERE user_role = 'u' AND user_status = 1";
                $result = $obj->executeSQL($sql, $paramList , true);
                foreach($result as $res) { 
                    ?>
                
                    <tr>
                    <td><input type="checkbox" name="checkbox"></td>
                    <td><img src="../images/user.png" onerror="onImgError(this)" alt="image" class="crtudTableImage"></td>
                    <td><?php echo $res["user_id"] ?></td>
                    <td><?php echo $res["user_name"] ?></td>
                    <td><?php echo $res["user_email"] ?></td>
                    <td><?php echo date('Y-M-d | h:i:s A', strtotime($res["created_at"])) ?></td>
                    <td><?php echo date('Y-M-d | h:i:s A', strtotime($res["updated_at"])) ?></td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm" id="btnEdit">
                        <i class="fa fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                        </a>
                        |
                        <a href="abc.html" class="btn btn-warning btn-sm" id="btnTrash" data-bs-toggle="modal"
                        data-bs-target="#modal">
                        <i class="fa fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="top" title="Trash"></i>
                        </a>
                        |
                        <a href="#" class="btn btn-danger btn-sm" id="btnDelete" data-bs-toggle="modal"
                        data-bs-target="#modal">
                        <i class="fa fa-times-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                        </a>
                    </td>
                    </tr>
                <?php } ?>
                    
                </tbody>
                </table>

                <div class="tableOptions">
                <div class="btn-group btn-group-sm">
                    <a type="button" class="btn btn-success" href="users.php" id="refreshButton">Refresh</a>
                </div>
                <div class="btn-group btn-group-sm">
                    <a href="#" type="button" class="btn btn-warning disabled" id="trashSelectedButton"
                    data-bs-toggle="modal" data-bs-target="#modal">Trash</a>
                    <a type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown">
                    <span class="visually-hidden">Toggle Dropdown</span>
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item small" href="#" id="trashAll" data-bs-toggle="modal"
                        data-bs-target="#modal">Trash All</a></li>
                    </ul>
                </div>
                <div class="btn-group btn-group-sm">
                    <a type="button" href="#" class="btn btn btn-danger disabled" id="deleteSelectedButton"
                    data-bs-toggle="modal" data-bs-target="#modal">Delete</a>
                    <a type="button" class="btn btn btn-danger dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown">
                    <span class="visually-hidden">Toggle Dropdown</span>
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item small" href="#" id="deleteAll" data-bs-toggle="modal"
                        data-bs-target="#modal">Delete All</a></li>
                    </ul>
                </div>
                <hr>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation Message!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
            <form action="#">
                <p id="modalMessage">Are you sure you want to delete your account?</p>
                <button type="submit" class="btn btn-danger w-25">Yes</button>
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
      order: [[2, 'asc']],
    });





    function onImgError(source)
    {
        source.src = "../images/user-placeholder.png";
        // disable onerror to prevent endless loop
        source.onerror = "";
        return true;
    }

     /*----------------------------------------------------
        Trash and Delete button disable based on checkboxes
      ------------------------------------------------------*/

    document.querySelectorAll('#myTable input[type="checkbox"]').forEach(function (checkbox) {
      checkbox.addEventListener('change', function () {
        var a = document.querySelectorAll('#myTable input[type="checkbox"]:checked').length;
        if (a > 0) {
          document.getElementById('deleteSelectedButton').classList.remove('disabled');
          document.getElementById('trashSelectedButton').classList.remove('disabled');
        } else {
          document.getElementById('deleteSelectedButton').classList.add('disabled');
          document.getElementById('trashSelectedButton').classList.add('disabled');
        }
      });
    });


    /*----------------------------------------------------
        Check all checkboxes
    ------------------------------------------------------*/

      document.querySelector('#myTable #checkAll').addEventListener('click', function () {
      var isChecked = this.checked;
      var checkboxes = document.querySelectorAll('#myTable tr:has(td) input[type="checkbox"]');
      
      checkboxes.forEach(function (checkbox) {
          checkbox.checked = isChecked;
      });
    });

    var checkboxes = document.querySelectorAll('#myTable tr:has(td) input[type="checkbox"]');
    var checkAllCheckbox = document.querySelector('#checkAll');

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('click', function () {
            var isChecked = this.checked;
            var isHeaderChecked = checkAllCheckbox.checked;
            
            if (!isChecked && isHeaderChecked) {
                checkAllCheckbox.checked = isChecked;
            } else {
                var allUnchecked = true;
                
                checkboxes.forEach(function (checkbox) {
                    if (!checkbox.checked) {
                        allUnchecked = false;
                    }
                });
                
                console.log(allUnchecked);
                checkAllCheckbox.checked = allUnchecked;
            }
        });
    });

  </script>
















    <?php include('../includes/footer.php'); ?>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>