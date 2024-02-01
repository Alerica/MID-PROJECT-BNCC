<?php
$hostname = "localhost";
$username = "admin";
$password = "admin123";
$database = "attendance_system";

// Create connection
$connection = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Initialize variables for search
$searchTerm = "";
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
}

// Fetch admins from the database based on search term
$sql = "SELECT * FROM `admin` 
        WHERE `firstName` LIKE '%$searchTerm%' OR `lastName` LIKE '%$searchTerm%' OR `email` LIKE '%$searchTerm%'";
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
        // Handle the case when there are no matching admins in the database
        echo "No matching admins found.";
    }
} else {
    // Handle the case when the query fails
    echo "Error: " . $sql . "<br>" . $connection->error;
}

// Close the database connection
$connection->close();
?>

<!-- Add a simple search form (for testing) -->
<form method="GET" action="">
    <input type="text" name="search" placeholder="Search by first name, last name, or email" value="<?php echo $searchTerm; ?>">
    <input type="submit" value="Search">
</form>
