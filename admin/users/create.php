<?php
    include('../includes/header.php');
    include('../logics/old-data.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add New <?php echo ucwords($singular); ?></title>
    <?php include('../includes/head-contents.php'); ?>
</head>

<body>

    <?php include('../includes/admin-navbar.php'); ?>
    <?php include('../includes/admin-sidebar.php'); ?>
    <div class="container my-4">
        <div class="row px-2">
            <div class="col-6">
                <h2 class="text-danger fw-bold">Create <?php echo ucwords($singular); ?></h2>
            </div>
            <div class="col-6 text-end">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="index.php" type="button" class="btn btn-sm btn-outline-primary"><?php echo ucwords($plural); ?></a>
                    <a href="create.php" type="button" class="btn btn-sm btn-outline-secondary">Create</a>
                    <a href="blocked.php" type="button" class="btn btn-sm btn-outline-danger">Blocked</a>
                </div>
            </div>
        </div>
        <hr class="text-danger opacity-100 my-0">
    </div>

    <?php include('../../includes/messages.php'); ?>

    <div class="container my-5 px-4 py-1">
        <form class="p-4 p-md-5 border rounded-3 bg-white box needs-validation" onsubmit="return validateForm()" novalidate action="store.php" method="POST" enctype="multipart/form-data">
            <h4 class="fw-bold lh-1 mb-5">Create New <?php echo ucwords($singular); ?></h4>

            <div class="row">
                <div class="col-md-3 text-center">
                    <img src="../../images/placeholder.png" class="img img-fluid shadow rounded mb-4 entityImage" id="img">
                    <input type="file" name="img" accept="image/x-png,image/jpeg" id="imageUpload" class="form-control my-3">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Only JPG and PNG images are allowed. File size must be less than 0.5 MB.</div>
                    <button type="button" class="btn btn-secondary btn-sm mt-2 d-none" id="clearImage">Clear Image</button>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" placeholder="John Doe" value="<?php echo oldData("name") ?>" required>
                                <label>Name <span class="text-danger">*</span></label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" placeholder="name@example.com" value="<?php echo oldData("email") ?>" required>
                                <label>Email <span class="text-danger">*</span></label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Correct email format is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required oninput="checkPasswordStrength()">
                                <label class="w-100">Password <span class="text-danger">*</span><i class="fa-regular text-secondary fa-eye eyeButton ms-3" id="eyeButton" onclick="togglePassword();"></i></label>
                                <!--Password Strength Progress Bar -->
                                    <div class="progress mt-2" style="height: 5px; cursor:help;" id="progressBarDiv" title="Password must have at least one small alphabet, one capital alphabet, one special character, one number, and be at least 8 characters long." data-bs-toggle="tooltip">
                                    <div class="progress-bar" role="progressbar" id="passwordStrengthBar" style="width: 0%;"></div>
                                    </div>
                                    <small id="passwordStrengthMessage" class="form-text text-muted" style="display:none;"></small>
                                    <!--Password Strength Progress Bar ended -->
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelectGender" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="m" <?php if (oldData("gender") === 'm') echo 'selected'; ?>>Male</option>
                                    <option value="f" <?php if (oldData("gender") === 'f') echo 'selected'; ?>>Female</option>
                                    <option value="o" <?php if (oldData("gender") === 'o') echo 'selected'; ?>>Other</option>
                                </select>
                                <label>Gender</label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please select one option.</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" onclick="setDefaultDoB(this)" name="dob" placeholder="Date of Birth" value="<?php echo oldData("dob") ?>">
                                <label>Date of Birth</label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Correct date format is required.</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" name="phone" placeholder="Phone Number" value="<?php echo oldData("phone") ?>">
                                <label>Phone Number</label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Correct phone format is required.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="address" class="form-control" name="address" placeholder="Address" value="<?php echo oldData("address") ?>">
                                <label>Address</label>
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

    <?php 
       if (isset($_SESSION['formData'])) 
       {
            unset($_SESSION['formData']);
       }
    ?>

    <?php include('../../includes/footer.php'); ?>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/toggle-password.js"></script>
    <script src="../../js/check-password-strength.js"></script>
    <script src="../js/setDefaultDob.js"></script>
    <script src="../../js/display-clear-image.js"></script>
</body>

</html>