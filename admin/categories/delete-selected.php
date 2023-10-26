<?php
    include('../../logics/init-session.php'); // start session if it's not already started
    include('../logics/check-if-not-admin.php'); // check if user is not admin
    include('../../logics/db.php'); // database connection
	$obj = new db(); // create new object of db class

    if(isset($_POST['selectedIds']) && !empty($_POST['selectedIds']))
    {
        $ids = $_POST['selectedIds'];

        $paramList = explode(",", $ids); // Convert the comma-separated string to an array
        $placeholders = implode(',', array_fill(0, count($paramList), '?')); // Prepare a parameterized query with placeholders for each ID
        
        $sql2 = "SELECT category_image FROM categories WHERE category_id IN ($placeholders)";
        $result2 = $obj->executeSQL($sql2, $paramList, true);
        foreach($result2 as $res) 
        {
            if($res['category_image'] != '')
            {
                $path = "../uploads/categories/" . $res['category_image'];
                unlink($path);
            }
        }


        $sql = "DELETE FROM categories WHERE category_id IN ($placeholders)";
        $result = $obj->executeSQL($sql, $paramList);
        
        $affectedRows = $result['affectedRows'];
        $message = $affectedRows . " category[s] deleted successfully.";
        $_SESSION['success'] = $message;
        header("location: categories.php");
    }
    else
    {
        header("location: categories.php");
    }

?>