<?php
    include('../includes/header.php');
    
    if(isset($_GET['id']) && $_GET['id'] != '')
    {
        $id = $_GET['id'];
        $paramList = [$id];
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE $plural SET status = 1, updated_at = '$date' WHERE id = ? AND status = 0 AND role != 'a'";
        $result = $obj->executeSQL($sql, $paramList);
        $affectedRows = $result['affectedRows'];
        $message = $affectedRows . " " . $singular . " unblocked successfully.";
        $_SESSION['success'] = $message;
        header("location: blocked.php");
    }


    elseif(isset($_POST['unblockSelected']))
    {
        $ids = $_POST['selectedIds'];
        $date = date('Y-m-d H:i:s');
        $paramList = explode(",", $ids); // Convert the comma-separated string to an array
        $placeholders = implode(',', array_fill(0, count($paramList), '?')); // Prepare a parameterized query with placeholders for each ID
        $sql = "UPDATE $plural SET status = 1, updated_at = '$date' WHERE id IN ($placeholders) AND status = 0 AND role != 'a'";
        $result = $obj->executeSQL($sql, $paramList);
        $affectedRows = $result['affectedRows'];
        $message = $affectedRows . " " . $singular . "[s] unblocked successfully.";
        $_SESSION['success'] = $message;
        header("location: blocked.php");
    }


    elseif(isset($_POST['unblockAll']))
    {
        $paramList = [];    
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE $plural SET status = 1, updated_at = '$date' WHERE status = 0 AND role != 'a'";
        $result = $obj->executeSQL($sql, $paramList);
        $affectedRows = $result['affectedRows'];
        $message = $affectedRows . " " . $singular . "[s] unblocked successfully.";
        $_SESSION['success'] = $message;
        header("location: blocked.php");
    }
    
    
    else
    {
        header("location: blocked.php");
    }
    
?>