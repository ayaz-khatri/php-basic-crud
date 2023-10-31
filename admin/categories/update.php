<?php

	if (isset($_POST['submit'])) 
	{
		include('../../logics/init-session.php'); // start session if it's not already started
        include('../logics/check-if-not-admin.php'); // check if user is not admin
        include('../../logics/db.php'); // database connection
        $obj = new db(); // create new object of db class

        include('variables.php');

        $id = $_POST['id'];
        $name = $_POST['name'];
        $url = "edit.php?id=$id";

		// Data validation
		if (empty($id)) 
		{
			$_SESSION['error'] = "Please fill all fields.";
		} 
		else 
		{
            $paramList = [$id];
            $sql = "SELECT * FROM $plural WHERE id = ?";
            $result = $obj->executeSQL($sql, $paramList, true);
            if($result == '' || empty($result))
            {
                $_SESSION['error'] = "Something went wrong.";
                header('location: index.php'); die();
            }
            else
            {
                $row = $result[0];
                if(($row['image'] != '') && $_FILES['img']['size'] == 0)
                {
                    $imageFileName = $row['image'];
                }
                else
                {
                    if($row['image'] != '')
                    {
                        $path = "../uploads/$plural/" . $row['image'];
                        unlink($path);
                    }
                    // Upload Image
    				$imageFileName = $obj->uploadImage($_FILES['img'], "../uploads/$plural/", $singular);
                }
            
                // Update into the database
                $date = date('Y-m-d H:i:s');
                $sqlUpdate = "UPDATE $plural SET name = ?, image = ?, updated_at = '$date' WHERE id = ?";
                $paramList = [$name, $imageFileName, $id];
                $result = $obj->executeSQL($sqlUpdate, $paramList);

                if ($result["queryExecuted"]) 
                {
                    $_SESSION['success'] = ucwords($singular) . " updated successfully.";
                    header('location: index.php'); die();
                } 
                else 
                {
                    $_SESSION['error'] = "Something went wrong.";
                    header('location: index.php'); die();
                }
            }
		}
		header('location: '. $url); die();
	}
	else
	{
		header('location: index.php'); die();
	}

?>