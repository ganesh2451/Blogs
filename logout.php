<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION['name'] = null;
$_SESSION['password'] = null;

// Destroy the session
session_destroy();

// Redirect to login page or homepage
header("Location: login.php");
exit;
?>
