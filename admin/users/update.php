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
        $gender = !empty($_POST['gender']) ? $_POST['gender'] : NULL;
		$dob = !empty($_POST['dob']) ? $_POST['dob'] : NULL;
		$phone = !empty($_POST['phone']) ? $_POST['phone'] : NULL;
		$address = !empty($_POST['address']) ? $_POST['address'] : NULL;
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

                if(($result[0]['user_image'] != '') && $_FILES['img']['size'] == 0)
                {
                    $imageFileName = $result[0]['user_image'];
                }
                else
                {
                    if($result[0]['user_image'] != '')
                    {
                        $path = "../uploads/users/" . $result[0]['user_image'];
                        unlink($path);
                    }
                    // Upload Image
    				$imageFileName = $obj->uploadImage($_FILES['img'], "../uploads/users/", "user");
                }
            
                // Update into the database
                $date = date('Y-m-d H:i:s');
                $sqlUpdateUser = "UPDATE users SET user_name = ?, user_email = ?, user_password = ?, user_gender = ?, user_dob = ?, user_phone = ?, user_address = ?, user_image = ?, updated_at = '$date' WHERE user_id = ?";
                $paramList = [$username, $email, $hashedPassword, $gender, $dob, $phone, $address, $imageFileName, $id];
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