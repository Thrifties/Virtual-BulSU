<?php
	session_start();
	if(isset($_SESSION["faculty_id"]) && isset($_SESSION["password"])){
		header('Location: VirtualBulsu_AnnouncementPanel.php');
		exit();
	}
?>