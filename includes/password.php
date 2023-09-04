<?php
require "sessionUnset.php";
require "connect.php";
$stud_id = $_SESSION['user'];
$pass = $_POST['password'];
if(isset($_POST['password'])){

    $query = "Select `stud_id`, `pass` FROM student WHERE stud_id ='$stud_id'  AND pass = '$pass'";
    $result =$con->query($query);

    if($result->num_rows > 0){
        echo json_encode(array('status' => 'error'));
    }
    
    else{
        echo json_encode(array('status' => 'success'));
    }

}
?>