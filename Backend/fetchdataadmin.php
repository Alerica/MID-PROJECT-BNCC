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

// Fetch all admins from the database
$sql = "SELECT * FROM `admin`";
$result = $connection->query($sql);

// Check if the query was successful
if ($result) {
    // Check if there are rows in the result set
    if ($result->num_rows > 0) {
        // Loop through the result set and display admin information
        while ($adminData = $result->fetch_assoc()) {
            ?>
            <div class="row">
                <div class="cell"><?php echo $adminData['firstName']; ?></div>
                <div class="cell"><?php echo $adminData['lastName']; ?></div>
                <div class="cell"><?php echo $adminData['email']; ?></div>
                <div class="cell"><?php echo $adminData['bio']; ?></div>
            </div>
            <?php
        }
    } else {
        // Handle the case when there are no admins in the database
        echo "No admins found.";
    }
} else {
    // Handle the case when the query fails
    echo "Error: " . $sql . "<br>" . $connection->error;
}

// Close the database connection
$connection->close();
?>
