<?php

class db
{

	/* -------------------------------------------------------------------------- */
	/*                          Variables for Connection                          */
	/* -------------------------------------------------------------------------- */

	private $dbHost = "localhost";
	private $dbUser = "root";
	private $dbPassword = "";
	private $dbName = "php_basic_crud_db";
	private $timezone = "Asia/Karachi";


	/* -------------------------------------------------------------------------- */
	/*                             Variables for Class                            */
	/* -------------------------------------------------------------------------- */

	private $mysqli = "";
	private $result = array();
	private $conn = false;

	
	/* -------------------------------------------------------------------------- */
	/*                            Constructor Function                            */
	/* -------------------------------------------------------------------------- */
	
	public function __construct()
	{
		date_default_timezone_set($this->timezone);
		if(!$this->conn)
		{
			$this->mysqli = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
			$this->conn = true;
			if($this->mysqli->connect_error)
			{
				array_push($this->result, $this->mysqli->connect_error);
				return false;

			}
		}
		else
		{
			return true;
		}
	}

	/* -------------------------------------------------------------------------- */
	/*                            Desstructor Function                            */
	/* -------------------------------------------------------------------------- */

	public function __destruct()
	{
		if($this->conn)
		{
			if($this->mysqli->close())
			{
				$this->conn = false;
				return true;
			}
		}else
		{
			return false;
		}
	}

	/* -------------------------------------------------------------------------- */
	/*                       Parameters Binding Dynamically                       */
	/* -------------------------------------------------------------------------- */

	public function dynamicallyBindParameters($query, $params)
	{
		$types = '';						// Generate the Type String (eg: 'issisd')
	        foreach($params as $param)
	        {
	            if(is_int($param)) 
	            {	$types .= 'i';	}			// Integer 
	            				
	            elseif (is_float($param)) 
	            {	$types .= 'd';	}			// Double 		
	            
	            elseif (is_string($param)) 
	            {   $types .= 's';	}			// String 		
	            
	            else 
	            {   $types .= 'b';	}			// Blob and Unknown			
	        }

	        $bind_names[] = $types;				// Add the Type String as the first Parameter
	  
	        for ($i=0; $i<count($params);$i++)	// Loop thru the given Parameters
	        { 
	            $bind_name = 'bind' . $i;		// Create a variable Name        
	            $$bind_name = $params[$i];		// Add the Parameter to the variable Variable
	            $bind_names[] = &$$bind_name;	// Associate the Variable as an Element in the Array
	        }
	        return $bind_names;
	}

	/* -------------------------------------------------------------------------- */
	/*                           Function to execute SQL                          */
	/* -------------------------------------------------------------------------- */
	
	public function executeSQL($query, $params, $select = false)
	{
	    if (!empty($params))
	    {        	        
	        $bind_names = $this->dynamicallyBindParameters($query, $params);
			$query = $this->mysqli->prepare($query);
	        call_user_func_array(array($query,'bind_param'), $bind_names);
	        $query->execute();
	        if($select)
	        {
	        	$result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
	    	}
	    	else
	    	{
	    		if($query->affected_rows > 0)
		        {
		        	$result = ["queryExecuted" => true, "affectedRows" => $query->affected_rows];
		        }
		        else
		        {
		        	$result = ["queryExecuted" => false, "affectedRows" => 0];
		        }
	    	}
	    }
	    else
	    {
	    	$query = $this->mysqli->prepare($query);
	        $query->execute();
	        if($select)
	        {
	        	$result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
	    	}
	    	else
	    	{
	    		if($query->affected_rows > 0)
		        {
		        	$result = ["queryExecuted" => true, "affectedRows" => $query->affected_rows];
		        }
		        else
		        {
		        	$result = ["queryExecuted" => false, "affectedRows" => 0];
		        }
	    	}
	    }
	    return $result;
	}


	/* -------------------------------------------------------------------------- */
	/*                    // Function to validate email format                    */
	/* -------------------------------------------------------------------------- */
	public function isEmailValid($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}


	/* -------------------------------------------------------------------------- */
	/*   // Function to validate password complexity (add more rules if needed)   */
	/* -------------------------------------------------------------------------- */
	public function isPasswordValid($password) {
		// Password should have at least 8 characters
		if (strlen($password) < 8) {
			return false;
		}
	
		$conditions_met = 0;
	
		// Check if password contains at least one small alphabet
		if (preg_match("/[a-z]/", $password)) {
			$conditions_met++;
		}
	
		// Check if password contains at least one capital alphabet
		if (preg_match("/[A-Z]/", $password)) {
			$conditions_met++;
		}
	
		// Check if password contains at least one number
		if (preg_match("/[0-9]/", $password)) {
			$conditions_met++;
		}
	
		// Check if password contains at least one special character
		if (preg_match("/[^a-zA-Z0-9]/", $password)) {
			$conditions_met++;
		}
	
		// Check if at least three conditions are satisfied
		if ($conditions_met >= 3) {
			return true;
		} else {
			return false;
		}
	}
	

	/* -------------------------------------------------------------------------- */
	/*                         // Function to Upload Image                        */
	/* -------------------------------------------------------------------------- */
	public function uploadImage($file, $uploadDirectory, $entityName = "img", $redirect = "create.php", $allowedTypes = ['image/jpeg', 'image/png'], $maxSize = 500000)
	{
		$imageFileName = NULL;

		if ($file['error'] === 0) {
			// Check if the file type is valid
			if (in_array($file['type'], $allowedTypes)) {
				// Check if the file size is within the allowed limit
				if ($file['size'] <= $maxSize) {
					$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
					// Generate a unique filename for the image (you can use a better method if needed)
					$imageFileName = $entityName . '-' . uniqid() .'.'. $ext;

					// Move the uploaded file to the server directory
					$imagePath = $uploadDirectory . $imageFileName;
					move_uploaded_file($file['tmp_name'], $imagePath);
				} else {
					$_SESSION['error'] = "Image size must be less than " . ($maxSize / 1000000) . " MB.";
					header('location:'.$redirect);
					die();
				}
			} else {
				$_SESSION['error'] = "Invalid image format. Allowed types: " . implode(', ', $allowedTypes);
				header('location:'.$redirect);
				die();
			}
		}

		return $imageFileName;
	}
	
	
	/* -------------------------------------------------------------------------- */
	/*                          Human Readable Timestamp                          */
	/* -------------------------------------------------------------------------- */

	public function timestampToCustomHumanReadable($timestamp) {
        $currentTimestamp = time();
        $timeDifference = abs($currentTimestamp - $timestamp);
    
        $secondsPerMinute = 60;
        $secondsPerHour = $secondsPerMinute * 60;
        $secondsPerDay = $secondsPerHour * 24;
        $secondsPerWeek = $secondsPerDay * 7;
        $secondsPerMonth = $secondsPerDay * 30; // Approximate
        $secondsPerYear = $secondsPerDay * 365; // Approximate
    
        if ($timeDifference >= $secondsPerYear) {
            $years = floor($timeDifference / $secondsPerYear);
            return $years . " year" . ($years > 1 ? "s" : "") . " ago";
        } elseif ($timeDifference >= $secondsPerMonth) {
            $months = floor($timeDifference / $secondsPerMonth);
            return $months . " month" . ($months > 1 ? "s" : "") . " ago";
        } elseif ($timeDifference >= $secondsPerWeek) {
            $weeks = floor($timeDifference / $secondsPerWeek);
            return $weeks . " week" . ($weeks > 1 ? "s" : "") . " ago";
        } elseif ($timeDifference >= $secondsPerDay) {
            $days = floor($timeDifference / $secondsPerDay);
            return $days . " day" . ($days > 1 ? "s" : "") . " ago";
        } elseif ($timeDifference >= $secondsPerHour) {
            $hours = floor($timeDifference / $secondsPerHour);
            return $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
        } else {
            $minutes = floor($timeDifference / $secondsPerMinute);
            return $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
        }
    }



	/*////////////////////////////////////////////////////////////////////////*/

} //Class Close

?>