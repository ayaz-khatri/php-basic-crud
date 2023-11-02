<?php

	if (isset($_POST['submit'])) 
	{
        include('../includes/header.php');

        $id = $_POST['id'];
        $name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
        $gender = !empty($_POST['gender']) ? $_POST['gender'] : NULL;
		$dob = !empty($_POST['dob']) ? $_POST['dob'] : NULL;
		$phone = !empty($_POST['phone']) ? $_POST['phone'] : NULL;
		$address = !empty($_POST['address']) ? $_POST['address'] : NULL;
        $hashedPassword = '';
        $url = "edit.php?id=$id";

		// Data validation
		if (empty($id) || empty($name) || empty($email)) 
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
            $sql = "SELECT * FROM $plural WHERE id = ? AND role != 'a'";
            $result = $obj->executeSQL($sql, $paramList, true);
            if($result == '' || empty($result))
            {
                $_SESSION['error'] = "Something went wrong.";
                header('location: index.php'); die();
            }
            else
            {
                $row = $result[0];
                if($email != $row['email'])
                {
                    $paramList = [$email];
                    $sqlCheckEmail = "SELECT COUNT(*) as count FROM $plural WHERE email = ?";
                    
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
                    $hashedPassword = $row['password'];
                }

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
                $sqlUpdate = "UPDATE $plural SET name = ?, email = ?, password = ?, gender = ?, dob = ?, phone = ?, address = ?, image = ?, updated_at = '$date' WHERE id = ?";
                $paramList = [$name, $email, $hashedPassword, $gender, $dob, $phone, $address, $imageFileName, $id];
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