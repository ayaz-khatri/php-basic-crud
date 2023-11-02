<?php

	if(isset($_POST['submit']))
	{
		include('init-session.php'); // start session if it's not already started
		include('check-loggedin-user.php'); // check if user is already login
		include('db.php'); // database connection
		$obj = new db(); // create new object of db class
		$email = $_POST['email'];
		$password = $_POST['password'];

		// Data validation
		if (empty($email) || empty($password)) 
		{
			$_SESSION['error'] = "Please fill all fields.";
		} 
		else
		{
			$paramList = [$email];
			$sql = "SELECT * FROM users WHERE email = ? AND status = 1";
			$result = $obj->executeSQL($sql, $paramList , true);
			if (empty($result)) 
			{
				$_SESSION['error'] = "Email is not registered in our database.";
			} 
			else
			{
				if(password_verify($password, $result[0]['password']))
				{
					$_SESSION['loggedin'] = true;
					$_SESSION['userid'] = $result[0]['id'];
					$_SESSION['username'] = $result[0]['name'];
					$_SESSION['usertype'] = $result[0]['role'];
					$_SESSION['userimage'] = $result[0]['image'];
					if($_SESSION['usertype'] == 'a')
					{
						header("Location: ../admin/home/index.php"); die();
					}
					else
					{
						header("Location: ../index.php"); die();
					}
				}
				else
				{
					$_SESSION['error'] = "Password does not match with our database.";	
				}
			}
		}
		header("Location: ../login.php"); die();
	}
	else
	{
		header("Location: ../login.php"); die();
	}	
?>