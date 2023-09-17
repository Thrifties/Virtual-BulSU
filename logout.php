<?php
	session_start();
	session_unset();
	session_destroy();
	header('Location: VirtualBulsu_Login.php');
?>