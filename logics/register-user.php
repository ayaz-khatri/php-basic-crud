<?php

	if (isset($_POST['submit'])) 
	{
		include('init-session.php'); // start session if it's not already started
		include('check-loggedin-user.php'); // check if user is already login
		include('db.php'); // database connection
		$obj = new db(); // create new object of db class
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];

		// Data validation
		if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) 
		{
			$_SESSION['error'] = "Please fill all fields.";
		} 
		elseif (!$obj->isEmailValid($email)) 
		{
			$_SESSION['error'] = "Invalid email format.";
		} 
		elseif ($password !== $confirmPassword) 
		{
			$_SESSION['error'] = "Passwords do not match.";
		} 
		elseif (!$obj->isPasswordValid($password)) 
		{
			$_SESSION['error'] = "Your password is not strong enough.";
		} 
		else 
		{
			// Check if email already exists in the database
			$paramList = [$email];
			$sqlCheckEmail = "SELECT COUNT(*) as count FROM users WHERE email = ?";
			
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
				$sqlInsertUser = "INSERT INTO users (name, email, password) VALUES (?,?,?)";
				$paramList = [$username, $email, $hashedPassword];
				$result = $obj->executeSQL($sqlInsertUser, $paramList);

				if ($result["queryExecuted"]) 
				{
					$_SESSION['success'] = "Account created successfully.";
					header('location: ../login.php'); die();
				} 
				else 
				{
					$_SESSION['error'] = "Something went wrong.";
				}
			}
		}
		header('location: ../register.php'); die();
	}
	else
	{
		header('location: ../register.php'); die();
	}

?>