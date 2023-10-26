<?php

	if (isset($_POST['submit'])) 
	{
		include('../../logics/init-session.php'); // start session if it's not already started
        include('../logics/check-if-not-admin.php'); // check if user is not admin
        include('../../logics/db.php'); // database connection
        $obj = new db(); // create new object of db class
		
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
            $sql = "SELECT * FROM categories WHERE category_id = ? AND category_status = 1";
            $result = $obj->executeSQL($sql, $paramList, true);
            if($result == '' || empty($result))
            {
                $_SESSION['error'] = "Something went wrong.";
                header('location: categories.php'); die();
            }
            else
            {
                if(($result[0]['category_image'] != '') && $_FILES['img']['size'] == 0)
                {
                    $imageFileName = $result[0]['category_image'];
                }
                else
                {
                    if($result[0]['category_image'] != '')
                    {
                        $path = "../uploads/categories/" . $result[0]['category_image'];
                        unlink($path);
                    }
                    // Upload Image
    				$imageFileName = $obj->uploadImage($_FILES['img'], "../uploads/categories/", "category");
                }
            
                // Update into the database
                $date = date('Y-m-d H:i:s');
                $sqlUpdate = "UPDATE categories SET category_name = ?, category_image = ?, updated_at = '$date' WHERE category_id = ?";
                $paramList = [$name, $imageFileName, $id];
                $result = $obj->executeSQL($sqlUpdate, $paramList);

                if ($result["queryExecuted"]) 
                {
                    $_SESSION['success'] = "Category updated successfully.";
                    header('location: categories.php'); die();
                } 
                else 
                {
                    $_SESSION['error'] = "Something went wrong.";
                    header('location: categories.php'); die();
                }
            }
		}
		header('location: '. $url); die();
	}
	else
	{
		header('location: categories.php'); die();
	}

?>