<?php
  include('../../includes/config.php'); // Website's configuration
  include('../../logics/init-session.php'); // start session if it's not already started
  $current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-md bg-dark navbar-dark box">
  <div class="container-fluid mx-4 my-1">
    <a class="navbar-brand fw-bold" href="../../index.php">
      <img src="../../images/logo.png" style="width: 32px;" alt="logo" class="me-2">
      <?php
        echo WEBSITE_NAME; // website name can be changed from config.php file in includes folder 
      ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav w-100">
        <span class="border-end me-2"></span>
        <li class="nav-item mt-2 mb-1">
          <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active fw-bold' : '' ?>" href="../home/index.php">Home</a>
        </li>
        <?php
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
            <li class="dropdown ms-md-auto">
              <a class="nav-link login-btn <?php echo ($current_page == 'login.php') ? 'active' : '' ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                <?php 
                  if(isset($_SESSION['userimage']) && $_SESSION['image'] != '') 
                  {
                      $img = "../uploads/users/".$_SESSION['userimage'];
                  }
                  else
                  {
                    $img = "../../images/user.png";
                  }
                ?>
                  
                <img src="<?php echo $img; ?>" class="navbarProfileImage rounded-circle p-1 mt-1">
              
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li class="text-center py-2 text-danger fw-bold"><?php echo strtoupper($_SESSION['username']); ?></li>
                <hr class="dropdown-divider">

                <?php
                  if ($_SESSION['usertype'] == 'a') { ?>
                    <li><a class="dropdown-item py-2" href="../home/index.php"><i class="fa-solid fa-house me-2"></i> Dashboard</a></li>
                <?php } ?>
                <li><a class="dropdown-item py-2" href="../../change-password.php"><i class="fa-solid fa-key me-2"></i> Change Password</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item py-2" href="../../logics/logout.php"><i class="fa-solid fa-power-off me-2"></i> Logout</a></li>
              </ul>
            </li>
        <?php } else { ?>
          <li class="nav-item color-white ms-md-auto btn badge <?php echo ($current_page == 'login.php') ? 'btn-danger' : 'btn-outline-danger' ?>">
            <a class="nav-link login-btn <?php echo ($current_page == 'login.php') ? 'active' : '' ?>" href="../login.php">Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>