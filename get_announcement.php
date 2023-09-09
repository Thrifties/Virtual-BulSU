<?php
// Include your database connection code here (e.g., require 'connect.php')

// Check if the announcementId parameter is provided via GET request
if (isset($_GET['announcementId'])) {
    $announcementId = $_GET['announcementId'];

    // Construct and execute a SQL query to fetch announcement details
    $query = "SELECT * FROM announcements WHERE announcementId = ?";
    
    // You should use prepared statements for security
    // Example using mysqli (make sure you've established a database connection)
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'i', $announcementId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the query was successful
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Check if an announcement with the given ID was found
        if ($row) {
            // Prepare the data as an associative array
            $announcementData = [
                'headline' => $row['headline'],
                'description' => $row['description'],
                'event_date' => $row['event_date'],
                // Add other fields as needed
            ];

            // Close the database connection (if not using a persistent connection)
            mysqli_close($con);

            // Return the announcement data as JSON
            header('Content-Type: application/json');
            echo json_encode($announcementData);
            exit;
        } else {
            // Announcement not found
            http_response_code(404);
            echo json_encode(['error' => 'Announcement not found']);
            exit;
        }
    } else {
        // Query execution failed
        http_response_code(500);
        echo json_encode(['error' => 'Database query failed']);
        exit;
    }
} else {
    // Invalid request (announcementId parameter not provided)
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
    exit;
}
?>
