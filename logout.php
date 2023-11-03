<head>
	<title>Logout</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 	<script src="sweetalert2.all.min.js"></script>
</head>


<?php
	session_start();
	session_unset();
	session_destroy();
	echo '
	<script>
	Swal.fire({
		title: "You have been logged out!",
		icon: "success",
		confirmButtonText: "OK"
	}).then(function() {
		window.location = "VirtualBulsu_Login.php";
	});
	</script>
	';
	header('Location: VirtualBulsu_Login.php');
?>