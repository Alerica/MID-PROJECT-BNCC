<?php
$hostname = "localhost";
$username = "admin";
$password = "admin123";
$database = "attendance_system";

// Create connection
$connection = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($result) {
    // Fetch the user data as an associative array
    $userData = $result->fetch_assoc();
    
    // Close the result set
    $result->close();
    
    // Close the database connection
    $connection->close();
} else {
    die("Error executing query: " . $connection->error);
}
?>
