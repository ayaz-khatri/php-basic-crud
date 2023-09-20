<?php 
  include('logics/init-session.php'); // start session if it's not already started
	include('logics/check-loggedin-user.php'); // check if user is already login
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <?php include('includes/head-contents.php'); ?>
</head>

<body>

  <?php include('includes/navbar.php'); ?>
  <?php include('includes/messages.php'); ?>

  <div class="container col-xl-10 col-xxl-8 px-4 py-1">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-6 text-center text-lg-start">
        <img src="images/login.png" class="img-fluid d-none d-md-block mx-auto" alt="Login">
      </div>
      <div class="col-md-10 mx-auto col-lg-6">
        <form class="p-4 p-md-5 border rounded-3 bg-white box needs-validation" novalidate action="logics/verify-login.php" method="POST">
          <h3 class="display-6 fw-bold lh-1 mb-3">Login</h3>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com" required>
            <label for="floatingEmail">Email</label>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Correct email format is required.</div>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
            <label for="floatingPassword" class="w-100">Password<i class="fa-regular text-secondary fa-eye eyeButton ms-3" id="eyeButton" onclick="togglePassword();"></i></label>
            <label for="floatingPassword">Password</label>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <input type="submit" class="w-100 btn btn-lg btn-danger" name="submit" value="Login">
          <div class="text-center my-3">
            Don't have an account? <a href="register.php" class="link">Register here</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include('includes/footer.php'); ?>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/toggle-password.js"></script>
</body>

</html>