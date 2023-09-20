<?php
    include('init-session.php'); // start session if it's not already started
    
    // Unset all of the session variables
    $_SESSION = array();
    
    // Destroy the session.
    session_destroy();
    include('init-session.php'); // start session if it's not already started
    // Redirect to login page
    $_SESSION['success'] = "Logout Successful!";
    header("location: ../login.php"); die();
?>
