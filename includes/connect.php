<?php
	$con = mysqli_connect("localhost","root","");
	if(!mysqli_select_db($con,"taskmeter")) 
	{
		die("connection error");
	}
?>