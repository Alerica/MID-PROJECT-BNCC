<?php
session_start();
$_SESSION = array();
// Delete the cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Regenerate session ID to prevent session fixation attacks
session_regenerate_id(true);

// Destroy the session
session_destroy();

// Clear remember me cookies
if (isset($_COOKIE["email"])) {
    setcookie("email", "", time() - 3600, '/');
}
if (isset($_COOKIE["password"])) {
    setcookie("password", "", time() - 3600, '/');
}

// Redirect to the login page
header("Location: login.php");
exit();
?>

