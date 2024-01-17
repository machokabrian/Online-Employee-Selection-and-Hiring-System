<?php
// Ensure a session is started before accessing session variables
session_start();

// Check if employer_id is set in the session
if (!isset($_SESSION['employer_id'])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}

// Assuming you have established a database connection
// Replace 'your_db_host', 'your_db_username', 'your_db_password', and 'your_db_name' with actual database credentials
$conn = new mysqli('your_db_host', 'your_db_username', 'your_db_password', 'your_db_name');

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the employer's ID from the session
$employerId = $_SESSION['employer_id'];

// Retrieve the employer's profile information from the database
$sql = "SELECT * FROM employers WHERE employer_id = $employerId";
$result = $conn->query($sql);

// Check if there is a result
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employerName = $row["name"];
    $employerEmail = $row["email"];
    $employerCompany = $row["company"];
    // Other profile information...
} else {
    // Employer not found
    echo "Employer not found.";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employer Profile</title>
    <!-- Add your CSS styling here -->
</head>
<body>
    <h1>Employer Profile</h1>
    <p><strong>Name:</strong> <?php echo $employerName; ?></p>
    <p><strong>Email:</strong> <?php echo $employerEmail; ?></p>
    <p><strong>Company:</strong> <?php echo $employerCompany; ?></p>
    <!-- Display other profile information here -->
    <p><a href="update_profile.php">Edit Profile</a></p>
    <!-- Add other employer-specific content and functionalities here -->
</body>
</html>
