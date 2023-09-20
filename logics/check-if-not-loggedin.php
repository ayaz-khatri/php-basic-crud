<?php 
	
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
	{
		$folder = basename(getcwd());
		if($folder == "logics")
		{
			header("Location: ../login.php"); die();
		}
		else
		{
			header("Location: login.php"); die();
		}	
	}

?>
