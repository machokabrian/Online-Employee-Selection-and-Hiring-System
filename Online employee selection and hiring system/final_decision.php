<!DOCTYPE html>
<html>
<head>
    <title>Final Decision</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h1>Final Decision</h1>

    <?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "system";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $applicationId = $_POST['application_id'];
        $finalDecision = $_POST['final_decision'];
        
        // Update final decision in the database
        $sql = "UPDATE final SET final_decision = '$finalDecision' WHERE id = '$applicationId'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Final decision updated successfully!";
        } else {
            echo "Error updating final decision: " . $conn->error;
        }
    }

    // Close connection
    $conn->close();
    ?>

    <form method="post" >
        <input type="hidden" name="application_id" value="<?php echo $_GET['id']; ?>">
        <label for="final_decision">Final Decision:</label>
        <select name="final_decision" required>
            <option value="accepted">Accepted</option>
            <option value="rejected">Rejected</option>
        </select>
        <button type="submit">Update Final Decision</button>
    </form>

    <p><a href="applications.php">Back to Job Applications</a></p>
</body>
</html>
