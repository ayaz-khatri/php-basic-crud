<?php

	if (isset($_POST['submit'])) 
	{
		include('../includes/header.php');

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$gender = !empty($_POST['gender']) ? $_POST['gender'] : NULL;
		$dob = !empty($_POST['dob']) ? $_POST['dob'] : NULL;
		$phone = !empty($_POST['phone']) ? $_POST['phone'] : NULL;
		$address = !empty($_POST['address']) ? $_POST['address'] : NULL;

		// Data validation
		if (empty($name) || empty($email) || empty($password)) 
		{
			$_SESSION['error'] = "Please fill all fields.";
		} 
		elseif (!$obj->isEmailValid($email)) 
		{
			$_SESSION['error'] = "Invalid email format.";
		} 
		elseif (!$obj->isPasswordValid($password)) 
		{
			$_SESSION['error'] = "Your password is not strong enough.";
		} 
		else 
		{
			// Check if email already exists in the database
			$paramList = [$email];
			$sqlCheckEmail = "SELECT COUNT(*) as count FROM $plural WHERE email = ?";
			
			$emailExists = $obj->executeSQL($sqlCheckEmail, $paramList , true);
			if ($emailExists[0]['count'] > 0) 
			{
				$_SESSION['error'] = "Email is already registered.";
			} 
			else 
			{
				// Upload Image
				$imageFileName = $obj->uploadImage($_FILES['img'], "../uploads/$plural/", $singular);
				
				// Hash the password
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

				// Insert into the database
				$sqlInsert = "INSERT INTO $plural (name, email, password, gender, dob, phone, address, image) VALUES (?,?,?,?,?,?,?,?)";
				$paramList = [$name, $email, $hashedPassword, $gender, $dob, $phone, $address, $imageFileName];
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
		}
		$_SESSION['formData'] = $_POST;
		header('location: create.php'); die();
	}
	else
	{
		$_SESSION['formData'] = $_POST;
		header('location: create.php'); die();
	}
?>