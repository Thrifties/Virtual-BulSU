

 <?php
require "connect.php"; // Include your database connection code

// Check if faculty_id is provided via POST
if (isset($_POST['faculty_id'])) {
    $facultyId = $_POST['faculty_id'];

    // Get the admin record before deleting it
    $sqlSelect = "SELECT * FROM campus_admin WHERE faculty_id = ?";
    $stmtSelect = $con->prepare($sqlSelect);
    $stmtSelect->bind_param("i", $facultyId);
    $stmtSelect->execute();
    $result = $stmtSelect->get_result();
    $adminData = $result->fetch_assoc();

    // Archive the admin data
    $sqlArchive = "INSERT INTO archive_admin (faculty_id, first_name, last_name, campus, email, contact_num)
                   VALUES (?, ?, ?, ?, ?, ?)";
    $stmtArchive = $con->prepare($sqlArchive);
    $stmtArchive->bind_param("isssss", $adminData['faculty_id'], $adminData['first_name'], $adminData['last_name'], $adminData['campus'], $adminData['email'], $adminData['contact_num']);
    $stmtArchive->execute();

    // Delete the admin record from the original table
    $sqlDelete = "DELETE FROM campus_admin WHERE faculty_id = ?";
    $stmtDelete = $con->prepare($sqlDelete);
    $stmtDelete->bind_param("i", $facultyId);

    if ($stmtDelete->execute()) {
        $response = ["success" => "Admin archived successfully"];
    } else {
        $response = ["error" => "Error archiving admin: " . $stmtDelete->error];
    }

    // Close the prepared statements
    $stmtSelect->close();
    $stmtArchive->close();
    $stmtDelete->close();
} else {
    $response = ["error" => "Invalid request"];
}

// Return a JSON response
header("Content-Type: application/json");
echo json_encode($response);

// Close the database connection
$con->close();
?>