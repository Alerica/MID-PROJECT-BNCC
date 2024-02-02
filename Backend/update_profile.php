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

// Handle form submission for profile update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $userId = $_POST["userId"];
    $field = $_POST["field"];
    $value = $_POST["value"];

    // Update the user profile 
    $updateQuery = "UPDATE `users` SET $field = ? WHERE `id` = ?";
    $stmt = $connection->prepare($updateQuery);
    $stmt->bind_param("ss", $value, $userId);

    if ($stmt->execute()) {
        $response = array(
            "status" => "success",
            "message" => "Profile updated successfully",
        );
    } else {
        $response = array("status" => "error", "message" => "Error: " . $connection->error);
    }

    $stmt->close();
}

$connection->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
