<?php
	//session_start();
	require "connect.php";
	/* if(isset($_SESSION["user"]) && isset($_SESSION["pass"])){
		
		header("Location: Dashboard.php");
		exit();
	}	 */
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$query = "SELECT * FROM campus_admin WHERE faculty_id='$user'and password='$pass'";
	$result = mysqli_query($con,$query);
	$count =  mysqli_num_rows($result);
	if($count==1){
		/* $_SESSION["user"] = $user;
		$_SESSION["pass"] = $pass; */
    echo 'Login Success!';
    header("refresh: 3; url=VirtualBulsu_SuperAdmin.php");
	}
	else{
    echo 'Login Failed!';
		header("refresh: 3; url=VirtualBulsu_Login.php");
	}
	mysqli_close($con);
?>