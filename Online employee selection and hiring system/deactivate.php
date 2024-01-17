<?php
session_start();

// Check if the user is logged in and has admin role
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Check if 'id' parameter is set and valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: users.php');
    exit;
}

$userId = $_GET['id'];

// Database credentials
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Deactivate the user
$updateSql = "UPDATE users SET status = 'Inactive' WHERE id = ?";
$updateStmt = $conn->prepare($updateSql);
$updateStmt->bind_param("i", $userId);
$updateStmt->execute();

if ($updateStmt->affected_rows > 0) {
    // User deactivated successfully
    header('Location: users.php');
    exit;
} else {
    // Failed to deactivate user
    header('Location: users.php?error=deactivate');
    exit;
}

$conn->close();
?>
