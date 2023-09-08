<?php
	session_start();
	if (!isset($_SESSION["adminID"]) && !isset($_SESSION["password"]))
	{
	header('Location: login.php');
	exit();
	}
?>