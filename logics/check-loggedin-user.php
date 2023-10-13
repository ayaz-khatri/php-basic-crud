<?php 

	if(isset($_SESSION['userid']) )
	{
		if($_SESSION['usertype'] == 'a')
		{
			header("Location: admin/home/index.php"); die();
		}
		else
		{
			header("Location: index.php"); die();
		}
	}

?>
