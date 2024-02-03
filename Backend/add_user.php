<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "attendance_system";

$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $bio = $_POST["bio"];

    // Upload photo
    $photo = $_FILES["photo"]["tmp_name"];
    $photoContent = file_get_contents($photo);

    // Query the database to find the maximum existing user ID
    $result = $connection->query("SELECT MAX(CAST(SUBSTRING(Id, 2) AS SIGNED)) AS maxId FROM users");
    $row = $result->fetch_assoc();
    $maxId = $row['maxId'];

    // Increment the maximum user ID
    $nextId = 'U' . str_pad($maxId + 1, 3, '0', STR_PAD_LEFT);

    // Generate password
    function generateRandomPassword($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $password;
    }
    $randomPassword = generateRandomPassword();

    // Hash the password 
    $hashedPassword = md5($randomPassword);

    // Insert data into the 'users' table
    $sql = "INSERT INTO `users` (Id, Photo, firstName, lastName, email, hashedPassword, Password, bio) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssssss", $nextId, $photoContent, $firstName, $lastName, $email, $hashedPassword, $randomPassword, $bio);

    if ($stmt->execute()) {
        $response = array(
            "status" => "success",
            "message" => "User added successfully",
            "generatedPassword" => $randomPassword,
            "userId" => $nextId
        );
        echo '<script>
            alert("User added successfully!");
            setTimeout(function() {
                window.location.href = "dashbord.php";
            }, 1000);
          </script>';
          exit();
    } else {
        $response = array("status" => "error", "message" => "Error: " . $connection->error);
    }

    $stmt->close();
}

$connection->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
