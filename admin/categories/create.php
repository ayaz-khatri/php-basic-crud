<?php
include('../../logics/init-session.php'); // start session if it's not already started
include('../logics/check-if-not-admin.php'); // check if user is not admin
include('../../logics/db.php'); // database connection
$obj = new db(); // create new object of db class
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add New Category</title>
    <?php include('../includes/head-contents.php'); ?>
</head>

<body>

    <?php include('../includes/admin-navbar.php'); ?>
    <?php include('../includes/admin-sidebar.php'); ?>
    <div class="container my-4">
        <div class="row px-2">
            <div class="col-6">
                <h2 class="text-danger fw-bold">Create Cateogry</h2>
            </div>
            <div class="col-6 text-end">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="categories.php" type="button" class="btn btn-sm btn-outline-secondary">Categories</a>
                    <a href="blocked.php" type="button" class="btn btn-sm btn-outline-danger">Blocked Categories</a>
                </div>
            </div>
        </div>
        <hr class="text-danger opacity-100 my-0">
    </div>

    <?php include('../../includes/messages.php'); ?>

    <div class="container my-5 px-4 py-1">
        <form class="p-4 p-md-5 border rounded-3 bg-white box needs-validation" onsubmit="return validateForm()" novalidate action="store.php" method="POST" enctype="multipart/form-data">
            <h4 class="fw-bold lh-1 mb-5">Create New Category</h4>

            <div class="row">
                <div class="col-md-3 text-center">
                    <img src="../../images/placeholder.png" class="img img-fluid shadow rounded mb-4 entityImage" id="img">
                    <input type="file" name="img" accept="image/x-png,image/jpeg" id="imageUpload" class="form-control">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Only JPG and PNG images are allowed. File size must be less than 0.5 MB.</div>
                    <button type="button" class="btn btn-secondary btn-sm mt-2 d-none" id="clearImage">Clear Image</button>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingName" name="name" placeholder="John Doe" required>
                                <label for="floatingName">Name <span class="text-danger">*</span></label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="w-25 mx-auto d-block btn btn-lg btn-danger mt-4" name="submit" value="Insert">
                        </div>
                    </div>   
                </div>
            </div>
        </form>
    </div>
    <?php include('../../includes/footer.php'); ?>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/display-clear-image.js"></script>

</body>

</html>