<?php
    include('../../logics/init-session.php'); // start session if it's not already started
    include('../logics/check-if-not-admin.php'); // check if user is not admin
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <?php include('../includes/head-contents.php'); ?>
</head>

<body>

    <?php include('../includes/admin-navbar.php'); ?>
    <?php include('../includes/admin-sidebar.php'); ?>
    <div class="container my-5">
        <div class="row px-2">
            <div class="col-6">
                <h2 class="text-danger fw-bold">Dashboard</h2>
            </div>
            <div class="col-6 text-end">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <!-- <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Share</a>
                    <a href="#" type="button" class="btn btn-sm btn-outline-danger">Export</a> -->
                </div>
            </div>
        </div>
        <hr class="text-danger opacity-100 my-0">
    </div>


    <?php include('../includes/admin-dashboard-icons.php'); ?>
    <?php include('../../includes/footer.php'); ?>

    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>

</html>