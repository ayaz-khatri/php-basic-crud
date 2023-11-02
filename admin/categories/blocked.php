<?php
    include('../../logics/init-session.php'); // start session if it's not already started
    include('../logics/check-if-not-admin.php'); // check if user is not admin
    include('../../logics/db.php'); // database connection
	$obj = new db(); // create new object of db class

    $datatable = true;
    include('variables.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blocked <?php echo ucwords($plural) ?></title>

    <?php include('../includes/head-contents.php'); ?>
</head>

<body>

    <?php include('../includes/admin-navbar.php'); ?>
    <?php include('../includes/admin-sidebar.php'); ?>
    <div class="container my-4">
        <div class="row px-2">
            <div class="col-6">
                <h2 class="text-danger fw-bold">Blocked <?php echo ucwords($plural); ?></h2>
            </div>
            <div class="col-6 text-end">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="create.php" type="button" class="btn btn-sm btn-outline-secondary">Create</a>
                    <a href="index.php" type="button" class="btn btn-sm btn-outline-danger"><?php echo ucwords($plural); ?></a>
                </div>
            </div>
        </div>
        <hr class="text-danger opacity-100 my-0">
    </div>
    
    <?php include('../../includes/messages.php'); ?>
    
    <div class="container">
        <div class="row">
        <div class="col">
            <div id="crudTable" class="shadow mb-5 p-4 rounded">
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="myTable">
                <thead>
                    <tr>
                    <th><input type="checkbox" name="checkbox" id="checkAll"></th>
                    <th>Image</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th class="actionColumn">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                $paramList = [];
                $sql = "SELECT * FROM $plural WHERE status = 0 ORDER BY id DESC";
                $result = $obj->executeSQL($sql, $paramList , true);
                foreach($result as $row) { 
                    ?>
                
                    <tr>
                    <td><input type="checkbox" name="checkbox"></td>
                    <?php $img = empty($row['image']) ? "../../images/placeholder.png" : "../uploads/$plural/" . $row['image']?>
                    <td><img src="<?php echo $img ?>" alt="image" class="crtudTableImage rounded"></td>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo date('Y-M-d | h:i:s A', strtotime($row["created_at"])) ?></td>
                    <td><?php echo date('Y-M-d | h:i:s A', strtotime($row["updated_at"])) ?></td>
                    
                    <!-- Table Action Column -->
                    <?php include('../includes/table-actions.php'); ?>
                    
                    </tr>
                <?php } ?>
                    
                </tbody>
                </table>

                <!-- Table Options -->
                <?php include('../includes/table-options.php'); ?>


            </div>
            </div>
        </div>
        </div>
    </div>

    <?php include('../includes/delete-modals.php'); ?>
    <?php include('../includes/unblock-modals.php'); ?>

    

    <script>
    /*--------------------------
      Data Table
    ---------------------------*/
    // Initialize DataTable
    var dataTable = new DataTable(document.querySelector('#myTable'), {
      columnDefs: [
        {
          targets: [0, 1, 6], // column index (start from 0)
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