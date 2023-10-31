<?php

	if (isset($_POST['submit'])) 
	{
		include('../../logics/init-session.php'); // start session if it's not already started
        include('../logics/check-if-not-admin.php'); // check if user is not admin
        include('../../logics/db.php'); // database connection
        $obj = new db(); // create new object of db class

		include('variables.php');

		$name = $_POST['name'];
	
		// Data validation
		if (empty($name)) 
		{
			$_SESSION['error'] = "Please fill all fields.";
		} 
		else 
		{
			// Upload Image
			$imageFileName = $obj->uploadImage($_FILES['img'], "../uploads/$plural/", $singular);
			
			// Insert into the database
			$sqlInsert = "INSERT INTO $plural (name, image) VALUES (?,?)";
			$paramList = [$name, $imageFileName];
			$result = $obj->executeSQL($sqlInsert, $paramList);

			if ($result["queryExecuted"]) 
			{
				$_SESSION['success'] = ucwords($singular) ." created successfully.";
				header('location: index.php'); die();
			} 
			else 
			{
				$_SESSION['error'] = "Something went wrong.";
			}
			
		}
		header('location: create.php'); die();
	}
	else
	{
		header('location: create.php'); die();
	}












?>