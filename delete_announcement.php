

<?php
require "connect.php";

// Check if announcementId is set in the POST request
if (isset($_POST['announcementId'])) {
    $announcementId = $_POST['announcementId'];

    // Get the announcement data before deletion
    $selectQuery = "SELECT * FROM announcements WHERE announcement_id = ?";
    $stmt = mysqli_prepare($con, $selectQuery);

    if ($stmt === false) {
        $response = array("error" => "Select query preparation failed.");
    } else {
        mysqli_stmt_bind_param($stmt, "i", $announcementId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $announcementData = mysqli_fetch_assoc($result);

        // Archive the announcement
        $archiveQuery = "INSERT INTO archive_announcement (announcement_id, author, headline, description, file_input, campus_assignment, college_assignment, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $archiveQuery);

        if ($stmt === false) {
            $response = array("error" => "Archive query preparation failed.");
        } else {
            mysqli_stmt_bind_param($stmt, "isssssss", $announcementData['announcement_id'], $announcementData['author'], $announcementData['headline'], $announcementData['description'], $announcementData['file_input'], $announcementData['campus_assignment'], $announcementData['college_assignment'], $announcementData['created_at']);
            
            if (mysqli_stmt_execute($stmt)) {

                $response = array("success" => "Announcement archived successfully.");

                $deleteQuery = "DELETE FROM announcements WHERE announcement_id = ?";
                $stmt = mysqli_prepare($con, $deleteQuery);

                if ($stmt === false) {
                    $response = array("error" => "Delete query preparation failed.");
                } else {
                    mysqli_stmt_bind_param($stmt, "i", $announcementId);

                    if (!mysqli_stmt_execute($stmt)) {
                        $response = array("error" => "Announcement deletion failed.");
                    }
                }
            } else {
                $response = array("error" => "Announcement archive failed.");
            }
        }

        mysqli_stmt_close($stmt);
    }
} else {
    $response = array("error" => "Invalid request.");
}

// Send the JSON response back to the calling page
header("Content-Type: application/json");
echo json_encode($response);

// Close the database connection
mysqli_close($con);
?>
