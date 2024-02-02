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

    // Fetch all users from the database
    $sql = "SELECT * FROM `users`";
    $result = $connection->query($sql);

    // Check if the query was successful
    if ($result) {
        // Check if there are rows in the result set
        if ($result->num_rows > 0) {
            // Initialize user number counter
            $userNumber = 1;

            // Loop through the result set and display user information
            while ($userData = $result->fetch_assoc()) {
                ?>
                <div class="row">
                    <div class="cell" data-title="Number">
                        <?php echo $userNumber; ?>
                    </div>
                    <div class="cell">
                        <?php
                        // Check if the 'Photo' column is not empty
                        if (!empty($userData['Photo'])) {
                            $base64Image = base64_encode($userData['Photo']);
                            echo "<img src='data:image/jpeg;base64, $base64Image' alt='User Photo'>";
                        } else {
                            echo "No photo available";
                        }
                        ?>
                    </div>
                    <div class="cell"><?php echo $userData['firstName'] . ' ' . $userData['lastName']; ?></div>
                    <div class="cell"><?php echo $userData['email']; ?></div>

                </div>
                <?php
                // Increment user number for the next iteration
                $userNumber++;
            }
        } else {
            // Handle the case when there are no users in the database
            echo "No users found.";
        }
    } else {
        // Handle the case when the query fails
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    // Close the database connection
    $connection->close();
?>
