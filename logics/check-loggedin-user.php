<?php 

	if(isset($_SESSION['userid']) )
	{
		if($_SESSION['usertype'] == 'a')
		{
			header("Location: admin/index.php"); die();
		}
		else
		{
			header("Location: index.php"); die();
		}
	}

?>
