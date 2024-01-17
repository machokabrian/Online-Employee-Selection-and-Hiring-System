<?php
 // Include the database connection file
 require_once include 'db_connection.php';

// Database configuration
$host = 'localhost';
$dbname = 'PLAYGROUND';
$username = 'root';
$password = '';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection errors
    die("Connection failed: " . $e->getMessage());
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    // Get form data
    $jobId = $_POST['job_id'];
    $jobTitle = $_POST['job-title'];
    $companyName = $_POST['company-name'];
    $location = $_POST['location'];
    $jobType = $_POST['job-type'];
    $description = $_POST['description'];
    $requirements = $_POST['requirements'];
    $applicationDeadline = $_POST['application-deadline'];

    // Update the job posting
    $sql = "UPDATE job_postings 
            SET job_title = ?, company_name = ?, location = ?, job_type = ?, description = ?, requirements = ?, application_deadline = ?
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $jobTitle, $companyName, $location, $jobType, $description, $requirements, $applicationDeadline, $jobId);

    if ($stmt->execute()) {
        // Successful update
        header('Location: job_postings.php?status=success');
    } else {
        // Error occurred
        header('Location: job_postings.php?status=error');
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirect back if accessed directly
    header('Location: job_postings.php');
}
?>
