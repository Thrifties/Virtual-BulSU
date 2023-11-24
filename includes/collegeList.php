<?php
require "../connect.php";

// Assuming the parameter name is 'campus'
$campus = $_POST["campus"]; // Using $_GET to retrieve the parameter


$query = "SELECT * FROM bsu_campuses WHERE campus = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $campus);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
} else {
    echo json_encode(['error' => 'Campus not found' . $campus]);
}
?>
