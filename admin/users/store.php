<?php

	if (isset($_POST['submit'])) 
	{
		include('../../logics/init-session.php'); // start session if it's not already started
        include('../logics/check-if-not-admin.php'); // check if user is not admin
        include('../../logics/db.php'); // database connection
        $obj = new db(); // create new object of db class
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// Data validation
		if (empty($username) || empty($email) || empty($password)) 
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
			$sqlCheckEmail = "SELECT COUNT(*) as count FROM users WHERE user_email = ?";
			
			$emailExists = $obj->executeSQL($sqlCheckEmail, $paramList , true);
			if ($emailExists[0]['count'] > 0) 
			{
				$_SESSION['error'] = "Email is already registered.";
			} 
			else 
			{
				// Hash the password
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

				// Insert user into the database
				$sqlInsertUser = "INSERT INTO users (user_name, user_email, user_password) VALUES (?,?,?)";
				$paramList = [$username, $email, $hashedPassword];
				$result = $obj->executeSQL($sqlInsertUser, $paramList);

				if ($result["queryExecuted"]) 
				{
					$_SESSION['success'] = "User created successfully.";
					header('location: users.php'); die();
				} 
				else 
				{
					$_SESSION['error'] = "Something went wrong.";
				}
			}
		}
		header('location: create.php'); die();
	}
	else
	{
		header('location: create.php'); die();
	}

?>