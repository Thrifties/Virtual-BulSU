<?php
    require "sessionUnset.php";
    require "connect.php";
    $stud_id = $_POST['user'];

    if(isset($_GET['stud_id'])){

        $query = "SELECT `stud_id`, `fname`, `lname`, `email` FROM `student` WHERE `stud_id` = '".$_SESSION['user']."'";
        $result = mysqli_query($con,$query);

            if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            $activity_id = $row['stud_id'];
            $name = $row['fname'];
            $task = $row['lname'];
            $taskP = $row['email'];                              

            }
}

mysqli_close($con);

?>