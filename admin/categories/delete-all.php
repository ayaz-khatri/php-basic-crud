<?php
    include('../../logics/init-session.php'); // start session if it's not already started
    include('../logics/check-if-not-admin.php'); // check if user is not admin
    include('../../logics/db.php'); // database connection
	$obj = new db(); // create new object of db class


    $files = glob('../uploads/categories/*'); //get all file names
    foreach($files as $file){
        if(is_file($file))
        unlink($file); //delete file
    }

    $paramList = [];    
    $sql = "DELETE FROM categories";
    $result = $obj->executeSQL($sql, $paramList);
    
    $affectedRows = $result['affectedRows'];
    $message = $affectedRows . " category[s] deleted successfully.";
    $_SESSION['success'] = $message;
    header("location: categories.php");

?>