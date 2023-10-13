<?php 
	
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{
        if($_SESSION['usertype'] != 'a')
        {
            $folder = basename(getcwd());
            if($folder == "logics")
            {
                header("Location: ../../login.php"); die();
            }
            else
            {
                header("Location: ../../login.php"); die();
            }	
        }	
	}
    else
    {
        header("Location: ../../login.php"); die();
    }	

?>