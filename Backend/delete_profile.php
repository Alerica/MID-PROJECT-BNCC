<?php
$hostname = "localhost";
$username = "admin";
$password = "admin123";
$database = "attendance_system";

$connection = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the targetUserId parameter is set in the URL
if(isset($_GET['targetUserId'])) {
    // Sanitize the input to prevent SQL injection
    $targetUserId = mysqli_real_escape_string($connection, $_GET['targetUserId']);

    // Construct the DELETE query
    $sql = "DELETE FROM users WHERE Id = '$targetUserId'";

    // Execute the DELETE query
    if ($connection->query($sql) === TRUE) {
        echo "User profile with ID $targetUserId deleted successfully";
    } else {
        echo "Error deleting profile: " . $connection->error;
    }
} else {
    echo "No targetUserId specified";
}

// Close the database connection
$connection->close();
?>
