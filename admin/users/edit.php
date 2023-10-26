<?php

if(!isset($_GET['id']) || $_GET['id'] == '')
{
    header("location: users.php"); die();
}

include('../../logics/init-session.php'); // start session if it's not already started
include('../logics/check-if-not-admin.php'); // check if user is not admin
include('../../logics/db.php'); // database connection
$obj = new db(); // create new object of db class

$id = $_GET['id'];
        
$paramList = [$id];
$sql = "SELECT * FROM users WHERE user_id = ? AND user_role != 'a' AND user_status != 0";
$result = $obj->executeSQL($sql, $paramList, true);

if($result == '' || empty($result))
{
    $_SESSION['error'] = "Something went wrong.";
    header('location: users.php'); die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit User</title>
    <?php include('../includes/head-contents.php'); ?>
</head>

<body>

    <?php include('../includes/admin-navbar.php'); ?>
    <?php include('../includes/admin-sidebar.php'); ?>
    <div class="container my-4">
        <div class="row px-2">
            <div class="col-6">
                <h2 class="text-danger fw-bold">Edit User</h2>
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
        <form class="p-4 p-md-5 border rounded-3 bg-white box needs-validation" onsubmit="return validateForm()" novalidate action="update.php" method="POST" enctype="multipart/form-data">
            <h4 class="fw-bold lh-1 mb-5">Edit User</h4>


            <div class="row">
                <div class="col-md-3 text-center">
                    <?php 
                        if($result[0]['user_image'] != '')
                        { 
                            $img = "../uploads/users/" . $result[0]['user_image'];
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
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $result[0]['user_id'] ?>" required>
                                <input type="name" class="form-control" id="floatingName" name="username" value="<?php echo $result[0]['user_name'] ?>" placeholder="John Doe">
                                <label for="floatingEmail">Name</label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingEmail" name="email" value="<?php echo $result[0]['user_email'] ?>" placeholder="name@example.com" required>
                                <label for="floatingEmail">Email</label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Correct email format is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword" class="w-100">Password<i class="fa-regular text-secondary fa-eye eyeButton ms-3" id="eyeButton" onclick="togglePassword();"></i></label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">You need at least strong password.</div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelectGender" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="m" <?php echo ($result[0]['user_gender'] == 'm') ? "selected" : "" ?>>Male</option>
                                    <option value="f" <?php echo ($result[0]['user_gender'] == 'f') ? "selected" : "" ?>>Female</option>
                                    <option value="o" <?php echo ($result[0]['user_gender'] == 'o') ? "selected" : "" ?>>Other</option>
                                </select>
                                <label for="floatingSelectGender">Gender</label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please select one option.</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="floatingDate" onclick="setDefaultDoB(this)" name="dob" value="<?php echo $result[0]['user_dob'] ?>" placeholder="Date of Birth">
                                <label for="floatingDate">Date of Birth</label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Correct date format is required.</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="floatingPhone" name="phone" value="<?php echo $result[0]['user_phone'] ?>" placeholder="Phone Number">
                                <label for="floatingPhone">Phone Number</label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Correct phone format is required.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="address" class="form-control" id="floatingAddress" name="address" value="<?php echo $result[0]['user_address'] ?>" placeholder="Address">
                                <label for="floatingAddress">Address</label>
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