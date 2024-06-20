<?php
		$con=new mysqli("localhost","root","","saloon");
		if($con->connect_error)
		{
			echo $con->connect_error;
			exit;
		}
?>