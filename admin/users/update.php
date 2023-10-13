<?php

	if (isset($_POST['submit'])) 
	{
		include('../../logics/init-session.php'); // start session if it's not already started
        include('../logics/check-if-not-admin.php'); // check if user is not admin
        include('../../logics/db.php'); // database connection
        $obj = new db(); // create new object of db class
		
        $id = $_POST['id'];
        $username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
        $hashedPassword = '';
        $url = "edit.php?id=$id";

		// Data validation
		if (empty($id) || empty($username) || empty($email)) 
		{
			$_SESSION['error'] = "Please fill all fields.";
		} 
		elseif (!$obj->isEmailValid($email)) 
		{
			$_SESSION['error'] = "Invalid email format.";
		} 
		else 
		{
            $paramList = [$id];
            $sql = "SELECT * FROM users WHERE user_id = ? AND user_role != 'a'";
            $result = $obj->executeSQL($sql, $paramList, true);
            if($result == '' || empty($result))
            {
                $_SESSION['error'] = "Something went wrong.";
                header('location: users.php'); die();
            }
            else
            {
                if($email != $result[0]['user_email'])
                {
                    $paramList = [$email];
                    $sqlCheckEmail = "SELECT COUNT(*) as count FROM users WHERE user_email = ?";
                    
                    $emailExists = $obj->executeSQL($sqlCheckEmail, $paramList , true);
                    if ($emailExists[0]['count'] > 0) 
                    {
                        $_SESSION['error'] = "Email is already registered.";
                		header('location: '. $url); die();
                    } 
                }
                if($password != "")
                {
                    if (!$obj->isPasswordValid($password)) 
                    {
                        $_SESSION['error'] = "Your password is not strong enough.";
                        header('location: '. $url); die();
                    }
                    else
                    {
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    }
                }
                else
                {
                    $hashedPassword = $result[0]['user_password'];
                }
            
                // Insert user into the database
                $date = date('Y-m-d H:i:s');
                $sqlUpdateUser = "UPDATE users SET user_name = ?, user_email = ?, user_password = ?, updated_at = '$date' WHERE user_id = ?";
                $paramList = [$username, $email, $hashedPassword, $id];
                $result = $obj->executeSQL($sqlUpdateUser, $paramList);

                if ($result["queryExecuted"]) 
                {
                    $_SESSION['success'] = "User updated successfully.";
                    header('location: users.php'); die();
                } 
                else 
                {
                    $_SESSION['error'] = "Something went wrong.";
                    header('location: users.php'); die();
                }
            }
		}
		header('location: '. $url); die();
	}
	else
	{
		header('location: users.php'); die();
	}

?>