<?php
    include('../../logics/init-session.php'); // start session if it's not already started
    include('../logics/check-if-not-admin.php'); // check if user is not admin
    include('../../logics/db.php'); // database connection
	$obj = new db(); // create new object of db class
    
    include('variables.php');

    if(isset($_GET['id']) && $_GET['id'] != '')
    {
        $id = $_GET['id'];
        $paramList = [$id];
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE $plural SET status = 0, updated_at = '$date' WHERE id = ? AND status = 1";
        $result = $obj->executeSQL($sql, $paramList);
        $affectedRows = $result['affectedRows'];
        $message = $affectedRows . " " . $singular . " blocked successfully.";
        $_SESSION['success'] = $message;
        header("location: index.php");
    }


    elseif(isset($_POST['blockSelected']))
    {
        $ids = $_POST['selectedIds'];
        $date = date('Y-m-d H:i:s');
        $paramList = explode(",", $ids); // Convert the comma-separated string to an array
        $placeholders = implode(',', array_fill(0, count($paramList), '?')); // Prepare a parameterized query with placeholders for each ID
        $sql = "UPDATE $plural SET status = 0, updated_at = '$date' WHERE id IN ($placeholders) AND status = 1";
        $result = $obj->executeSQL($sql, $paramList);
        $affectedRows = $result['affectedRows'];
        $message = $affectedRows . " " . $singular . "[s] blocked successfully.";
        $_SESSION['success'] = $message;
        header("location: index.php");
    }


    elseif(isset($_POST['blockAll']))
    {
        $paramList = [];  
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE $plural SET status = 0, updated_at = '$date' WHERE status = 1";
        $result = $obj->executeSQL($sql, $paramList);
        $affectedRows = $result['affectedRows'];
        $message = $affectedRows . " " . $singular . "[s] blocked successfully.";
        $_SESSION['success'] = $message;
        header("location: index.php");
    }


    else
    {
        header("location: index.php");
    }
?>