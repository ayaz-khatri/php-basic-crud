<?php
    include('../../logics/init-session.php'); // start session if it's not already started
    include('../logics/check-if-not-admin.php'); // check if user is not admin
    include('../../logics/db.php'); // database connection
	$obj = new db(); // create new object of db class
    
    if(isset($_GET['id']) && $_GET['id'] != '')
    {
        $id = $_GET['id'];
        
        $paramList = [$id];

        $sql = "SELECT category_image FROM categories WHERE category_id = ?";
        $result = $obj->executeSQL($sql, $paramList, true);
        if($result[0]['category_image'] != '')
        {
            $path = "../uploads/categories/" . $result[0]['category_image'];
            unlink($path);
        }

        $sql = "DELETE FROM categories WHERE category_id = ?";
        $result = $obj->executeSQL($sql, $paramList);

        $affectedRows = $result['affectedRows'];
        $message = $affectedRows . " category deleted successfully.";
        $_SESSION['success'] = $message;
        header("location: categories.php");
    }
    else
    {
        header("location: categories.php");
    }
    
?>