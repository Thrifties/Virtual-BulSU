<?php
	session_start();
	if (!isset($_SESSION["user"]) && !isset($_SESSION["password"]))
	{
	header('Location: login.php');
	exit();
	}
?>