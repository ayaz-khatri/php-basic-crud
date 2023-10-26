<?php

if(!isset($_GET['id']) || $_GET['id'] == '')
{
    header("location: categories.php"); die();
}

include('../../logics/init-session.php'); // start session if it's not already started
include('../logics/check-if-not-admin.php'); // check if user is not admin
include('../../logics/db.php'); // database connection
$obj = new db(); // create new object of db class

$id = $_GET['id'];
        
$paramList = [$id];
$sql = "SELECT * FROM categories WHERE category_id = ? AND category_status != 0";
$result = $obj->executeSQL($sql, $paramList, true);

if($result == '' || empty($result))
{
    $_SESSION['error'] = "Something went wrong.";
    header('location: categories.php'); die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit category</title>
    <?php include('../includes/head-contents.php'); ?>
</head>

<body>

    <?php include('../includes/admin-navbar.php'); ?>
    <?php include('../includes/admin-sidebar.php'); ?>
    <div class="container my-4">
        <div class="row px-2">
            <div class="col-6">
                <h2 class="text-danger fw-bold">Edit Category</h2>
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
        <form class="p-4 p-md-5 border rounded-3 bg-white box needs-validation" onsubmit="return validateForm()" novalidate action="update.php" method="POST" enctype="multipart/form-data">
            <h4 class="fw-bold lh-1 mb-5">Edit Category</h4>


            <div class="row">
                <div class="col-md-3 text-center">
                    <?php 
                        if($result[0]['category_image'] != '')
                        { 
                            $img = "../uploads/categories/" . $result[0]['category_image'];
                        }
                        else
                        {
                            $img = "../../images/placeholder.png";
                        }
                    ?>
                    <img src="<?php echo $img; ?>" class="img img-fluid shadow rounded mb-4 entityImage" id="img">
                    <input type="file" name="img" accept="image/x-png,image/jpeg" id="imageUpload" class="form-control mb-3">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Only JPG and PNG images are allowed. File size must be less than 0.5 MB.</div>
                    <button type="button" class="btn btn-secondary btn-sm mt-2 d-none" id="clearImage">Clear Image</button>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $result[0]['category_id'] ?>" required>
                                <input type="name" class="form-control" id="floatingName" name="name" value="<?php echo $result[0]['category_name'] ?>" placeholder="John Doe">
                                <label for="floatingName">Name</label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="w-25 mx-auto d-block btn btn-lg btn-danger mt-4" name="submit" value="Update">
                        </div>
                    </div>
                </div>
            </div>

            
        </form>

    </div>


    <?php include('../../includes/footer.php'); ?>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/toggle-password.js"></script>
    <script src="../js/setDefaultDob.js"></script>
    <script src="../../js/display-clear-image.js"></script>


</body>

</html>