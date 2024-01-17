<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform the admin authentication process
    // You would need to implement your own logic to authenticate the admin user
    
    // Here is a simple example assuming the username is 'admin' and the password is 'password'
    if ($username === 'admin' && $password === 'password') {
        // Set session variables
        $_SESSION['admin_username'] = $username;
        
        // Redirect to the admin dashboard page
        header('Location: admin_dashboard.php');
        exit();
    } else {
        // Invalid login credentials, redirect back to the login page with an error message
        header('Location: index.php?error=InvalidCredentials');
        exit();
    }
} else {
    // Redirect back to the login page
    header('Location: login_admin.php');
    exit();
}
?>
