<?php
    include('../../logics/init-session.php'); // start session if it's not already started
    include('../logics/check-if-not-admin.php'); // check if user is not admin
    include('../../logics/db.php'); // database connection
	$obj = new db(); // create new object of db class

    if(isset($_POST['selectedIds']) && !empty($_POST['selectedIds']))
    {
        $ids = $_POST['selectedIds'];
        $date = date('Y-m-d H:i:s');
        $paramList = explode(",", $ids); // Convert the comma-separated string to an array
        $placeholders = implode(',', array_fill(0, count($paramList), '?')); // Prepare a parameterized query with placeholders for each ID
        
        $sql = "UPDATE categories SET category_status = 0, updated_at = '$date' WHERE category_id IN ($placeholders)";
        $result = $obj->executeSQL($sql, $paramList);
        
        $affectedRows = $result['affectedRows'];
        $message = $affectedRows . " category[s] blocked successfully.";
        $_SESSION['success'] = $message;
        header("location: categories.php");
    }
    else
    {
        header("location: categories.php");
    }

?>