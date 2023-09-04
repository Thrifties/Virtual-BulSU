<?php
	session_start();
	if(isset($_SESSION["facultyID"]) && isset($_SESSION["pass"])){
		header('Location: Dashboard.php');
		exit();
	}
?>