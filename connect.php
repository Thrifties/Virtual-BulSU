<?php
$host = "localhost";
$dbname = "u673355866_vbulsu";
$username = "u673355866_vbulsu";
$password = "a9FU@1F92e@$Hhf";

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected to the database successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
