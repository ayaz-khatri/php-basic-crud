<?php
    include('../../logics/init-session.php'); // start session if it's not already started
    include('../logics/check-if-not-admin.php'); // check if user is not admin
    include('../../logics/db.php'); // database connection
	$obj = new db(); // create new object of db class

    $paramList = [];  
    $date = date('Y-m-d H:i:s');
    $sql = "UPDATE users SET user_status = 0, updated_at = '$date' WHERE user_role != 'a'";
    $result = $obj->executeSQL($sql, $paramList);
    
    $affectedRows = $result['affectedRows'];
    $message = $affectedRows . " user[s] blocked successfully.";
    $_SESSION['success'] = $message;
    header("location: users.php");

?>