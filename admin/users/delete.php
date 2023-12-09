<?php
    include('../includes/header.php');

    if(isset($_GET['id']) && $_GET['id'] != '')
    {
        $id = $_GET['id'];
        $paramList = [$id];
        $sql = "SELECT image FROM $plural WHERE id = ? AND role != 'a'";
        $result = $obj->executeSQL($sql, $paramList, true);
        if($result[0]['image'] != '')
        {
            $path = "../uploads/$plural/" . $result[0]['image'];
            unlink($path);
        }
        $sql = "DELETE FROM $plural WHERE id = ? AND role != 'a'";
        $result = $obj->executeSQL($sql, $paramList);
        $affectedRows = $result['affectedRows'];
        $message = $affectedRows . " " . $singular . " deleted successfully.";
        $_SESSION['success'] = $message;
        header("location: index.php");
    }


    elseif(isset($_POST['deleteSelected']))
    {
        $ids = $_POST['selectedIds'];
        $paramList = explode(",", $ids); // Convert the comma-separated string to an array
        $placeholders = implode(',', array_fill(0, count($paramList), '?')); // Prepare a parameterized query with placeholders for each ID
        $sql2 = "SELECT image FROM $plural WHERE id IN ($placeholders) AND role != 'a'";
        $result2 = $obj->executeSQL($sql2, $paramList, true);
        foreach($result2 as $res) 
        {
            if($res['image'] != '')
            {
                $path = "../uploads/$plural/" . $res['image'];
                unlink($path);
            }
        }
        $sql = "DELETE FROM $plural WHERE id IN ($placeholders) AND role != 'a'";
        $result = $obj->executeSQL($sql, $paramList);
        $affectedRows = $result['affectedRows'];
        $message = $affectedRows . " " . $singular . "[s] deleted successfully.";
        $_SESSION['success'] = $message;
        header("location: index.php");
    }


    elseif(isset($_POST['deleteAll']))
    {
        $paramList = [];
        if ($_POST['page'] == "index.php") 
        {
            $sql = "SELECT image FROM $plural WHERE status = 1 AND image != ''";
        } 
        elseif ($_POST['page'] == "blocked.php") 
        {
            $sql = "SELECT image FROM $plural WHERE status = 0 AND image != ''";
        }
        // Execute the SQL query to get the file names
        $result = $obj->executeSQL($sql, $paramList, true);
       
        if ($result != '' || !empty($result)) {
            foreach ($result as $row) {
                $file = "../uploads/$plural/" . $row['image'];
                if (is_file($file)) {
                    unlink($file); // Delete the file
                }
            }
        }

        // Now that files are deleted, delete records from the database
        $paramList = [];
        if ($_POST['page'] == "index.php") 
        {
            $sql = "DELETE FROM $plural WHERE status = 1 AND role != 'a'";
        } 
        elseif ($_POST['page'] == "blocked.php") 
        {
            $sql = "DELETE FROM $plural WHERE status = 0 AND role != 'a'";
        }
        $result = $obj->executeSQL($sql, $paramList);
        $affectedRows = $result['affectedRows'];
        
        $message = $affectedRows . " " . $singular . "[s] deleted successfully.";
        $_SESSION['success'] = $message;
        header("location: index.php");
    }


    else
    {
        header("location: index.php");
    }  
?>