<?php 
    include('init-session.php'); // start session if it's not already started
    include('check-if-not-loggedin.php'); // check if user is not loggedin

    if (isset($_POST['submit'])) 
	{
        include('db.php'); // database connection
		$obj = new db(); // create new object of db class
		
        $user = $_SESSION['userid'];
        $oldPassword = $_POST['oldPassword'];
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];
        
        // Data validation
		if (empty($oldPassword) || empty($password) || empty($confirmPassword)) 
		{
			$_SESSION['error'] = "Please fill all fields.";
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
            $paramList = [$user];
			$sql = "SELECT * FROM users WHERE id = ? AND status = 1";
			$result = $obj->executeSQL($sql, $paramList , true);

            if(password_verify($oldPassword, $result[0]['password']))
			{
                // Hash the password
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $paramList = [$hashedPassword, $user];
                $sql = "UPDATE users SET password = ? WHERE id = ?";
			    $result = $obj->executeSQL($sql, $paramList);
                if($result["queryExecuted"] == true)
                {
                	$_SESSION['success'] = "Password updated successfully.";
                }
                else
                {
                	$_SESSION['error'] = "Something went wrong.";
                }
            }
            else
            {
                $_SESSION['error'] = "Password does not match with our records.";
            }
        }

        header("Location: ../change-password.php"); die();
		
	}
	else
	{
		header('location: ../index.php'); die();
	}




?>