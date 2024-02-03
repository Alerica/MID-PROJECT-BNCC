<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "attendance_system";

// Create connection
$connection = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch all emails from the 'users' table
$sql = "SELECT `email` FROM `users`";
$result = $connection->query($sql);

if ($result) {
    $emails = array();

    while ($row = $result->fetch_assoc()) {
        $emails[] = $row['email'];
    }

    // Return emails as JSON
    echo json_encode(array('emails' => $emails));
} else {
    // Handle database error
    echo json_encode(array('error' => 'Database error'));
}

// Close connection
$connection->close();
?>
