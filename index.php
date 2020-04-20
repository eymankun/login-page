<?php
// Initialize session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy session
session_destroy();

// Check if user has already logged in, if not redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
} else {
  // Redirect to login page
  header("loction: login.php");
  exit;
}
