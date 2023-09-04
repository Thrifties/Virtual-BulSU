<?php
	require "sessionUnset.php";
	require "connect.php";

if (isset($_POST['insbtn'])) {
	$groupid = $_POST['group_id'];
	$activityid = $_POST['activity_id'];
	$studid = $_POST['stud_id'];
	$task = $_POST['task'];
	$taskP = $_POST['taskP'];
	$deadline = $_POST['deadline'];
	
	$query = "SELECT CONCAT(fname,' ',lname ) as Name FROM student WHERE stud_id = '$studid'";
	$result =$con->query($query);
	$studname = $result->fetch_assoc();
	$Name = ($studname['Name']);
	$add = "INSERT INTO `groupings`(`group_id`, `activity_id`, `stud_ID`, `name`, `task`, `taskP`, `deadline`) VALUES ('$groupid','$activityid','$studid','$Name','$task','$taskP','$deadline')";

	if(mysqli_query($con,$add)){
            header("refresh: 0; url=SetupPage.php");
        }
        else{
            header("refresh: 0; url=AddMemberPage.php");
        }
	}

	mysqli_close($con);
?>