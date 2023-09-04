<?php

require "sessionUnset.php";
require "connect.php";
$activity_id=$_POST['activity_id'];



 if (isset ($_POST['submit'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode ('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'docx');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0 ) {
            if ($fileSize < 5000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                

                $query = "UPDATE `groupings` SET `file` = '$fileDestination', `status` = 'completed' WHERE activity_id = '$activity_id'";

                if(mysqli_query($con,$query)){
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: Dashboard.php");
                }
                else{
                    header("Location: activitysubmit.php");
                }
                
            } else {
                echo "File size too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}