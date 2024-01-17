<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch the values from the form
    $jobTitle = $_POST['job-title'];
    $companyName = $_POST['company-name'];
    $location = $_POST['location'];

    // Create a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete job from the database
    $sql = "DELETE FROM jobpostings WHERE job_title = ? AND company_name = ? AND location = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $jobTitle, $companyName, $location);

    if ($stmt->execute()) {
        echo "Job deleted successfully!";

         // Show the alert and redirect
         echo "<script>
         alert('Job updated successfully.');
         window.location.href = 'job_posting.php';
             </script>";
    } else {
        echo "Error deleting job: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
