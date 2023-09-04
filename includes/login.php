<head>
    <script src="jquery.js"></script>
    <script src="sweetalert.min.js"></script>
</head>


<?php
	session_start();
	require "connect.php";
	if(isset($_SESSION["user"]) && isset($_SESSION["pass"])){
		
		header("Location: Dashboard.php");
		exit();
	}	
	$user = $_POST["stud_id"];
	$pass = $_POST["pass"];
	$query = "SELECT * FROM student WHERE stud_id='$user'and pass='$pass'";
	$result = mysqli_query($con,$query);
	$count =  mysqli_num_rows($result);
	if($count==1){
		$_SESSION["user"] = $user;
		$_SESSION["pass"] = $pass;
		echo '
                                            <script>
                                            $(document).ready(function(){
                                                Swal.fire({
                                                    icon: "success",
                                                    title: "Log In Successfully!",
                                                    showConfirmButton: false,
                                                    timer: 2000,
                                                  })
                                                  .then(function(){
                                                    window.location.href = "Dashboard.php" 
                                                  })
                                            });
                                            </script>
                                            ';
	}
	else{
		echo '
                                            <script>
                                            $(document).ready(function(){
                                                Swal.fire({
                                                    icon: "error",
                                                    iconColor: "#FF2E2E",
                                                    title: "Log In Failed!",
                                                    text:"Username or Password is Incorrect",
                                                    showConfirmButton: false,
                                                    timer: 2000,
                                                  })
                                                  .then(function(){
                                                    window.location.href = "stud_signIn.php" 
                                                  })
                                            });
                                            </script>
                                            ';
	}
	mysqli_close($con);
?>