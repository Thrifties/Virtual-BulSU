<?php
	$con = mysqli_connect("localhost","root","");
	if(!mysqli_select_db($con,"virtual_bulsu_db")) 
	{
		die("connection error");
	}
?>