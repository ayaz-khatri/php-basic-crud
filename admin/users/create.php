<?php
include('../../logics/init-session.php'); // start session if it's not already started
include('../logics/check-if-not-admin.php'); // check if user is not admin
include('../../logics/db.php'); // database connection
$obj = new db(); // create new object of db class
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add New User</title>
    <?php include('../includes/head-contents.php'); ?>
</head>

<body>

    <?php include('../includes/admin-navbar.php'); ?>
    <?php include('../includes/admin-sidebar.php'); ?>
    <div class="container my-4">
        <div class="row px-2">
            <div class="col-6">
                <h2 class="text-danger fw-bold">Create User</h2>
            </div>
            <div class="col-6 text-end">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="users.php" type="button" class="btn btn-sm btn-outline-secondary">Users</a>
                    <a href="blocked.php" type="button" class="btn btn-sm btn-outline-danger">Blocked Users</a>
                </div>
            </div>
        </div>
        <hr class="text-danger opacity-100 my-0">
    </div>

    <?php include('../../includes/messages.php'); ?>

    <div class="container my-5 px-4 py-1">
        <form class="p-4 p-md-5 border rounded-3 bg-white box needs-validation" onsubmit="return validateForm()" novalidate action="store.php" method="POST">
            <h4 class="fw-bold lh-1 mb-5">Create New User</h4>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" id="floatingName" name="username" placeholder="John Doe" required>
                        <label for="floatingEmail">Name</label>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com" required>
                        <label for="floatingEmail">Email</label>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Correct email format is required.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                        <label for="floatingPassword" class="w-100">Password<i class="fa-regular text-secondary fa-eye eyeButton ms-3" id="eyeButton" onclick="togglePassword();"></i></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="submit" class="w-25 mx-auto d-block btn btn-lg btn-danger mt-4" name="submit" value="Insert">
                </div>
            </div>
        </form>

    </div>


    <?php include('../../includes/footer.php'); ?>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/toggle-password.js"></script>

</body>

</html>