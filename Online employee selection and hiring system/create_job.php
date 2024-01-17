<?php
// Initialize variables
$jobTitle = $companyName = $location = $jobType = $description = $requirements = $applicationDeadline = '';
$errors = array();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form inputs
    $jobTitle = $_POST['job-title'];
    $companyName = $_POST['company-name'];
    $location = $_POST['location'];
    $jobType = $_POST['job-type'];
    $description = $_POST['description'];
    $requirements = $_POST['requirements'];
    $applicationDeadline = $_POST['application-deadline'];

    if (empty($jobTitle)) {
        $errors['job-title'] = 'Job Title is required';
    }

    // Add more validation rules for other fields

    // If there are no validation errors, proceed to database insertion
    if (empty($errors)) {
        // Database connection
        $servername = "localhost"; // Change to your database server name
        $username = "root"; // Change to your database username
        $password = ""; // Change to your database password
        $dbname = "system"; // Change to your database name

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create the job_postings table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS jobpostings (
            id INT AUTO_INCREMENT PRIMARY KEY,
            job_title VARCHAR(255) NOT NULL,
            company_name VARCHAR(255) NOT NULL,
            location VARCHAR(255) NOT NULL,
            job_type VARCHAR(255),
            description TEXT NOT NULL,
            requirements TEXT NOT NULL,
            application_deadline DATE NOT NULL
        )";

        if ($conn->query($sql) === TRUE) {
            // Insert job posting into the table
            $insertSql = "INSERT INTO jobpostings (job_title, company_name, location, job_type, description, requirements, application_deadline)
            VALUES ('$jobTitle', '$companyName', '$location', '$jobType', '$description', '$requirements', '$applicationDeadline')";

            if ($conn->query($insertSql) === TRUE) {
                echo "Job created successfully!";
        // Show the alert and redirect
        echo "<script>
            alert('Job updated successfully.');
            window.location.href = 'job_posting.php';
                </script>";

            } 
            
            
            else {
                echo "Error: " . $insertSql . "<br>" . $conn->error;
            }
            if ($stmt->execute()) {
                $stmt->close();
                $conn->close();
                header("Location: jobpostings.php"); // Redirect back to job postings page
                exit();
            } else {
                echo "Error posting job: " . $stmt->error;
            }
        } 
        
        
        else {
            echo "Error creating table: " . $conn->error;
        }

        $conn->close();
    }

                     }
?>





<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Job</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }
  header {
    background-color: #35424a;
    color: white;
    padding: 10px;
    text-align: center;
  }
  .container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }
  form {
    margin-top: 20px;
  }
  label {
    display: block;
    margin-bottom: 5px;
  }
  input[type="text"], textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin-bottom: 10px;
  }
  button {
    background-color: #35424a;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }
  button:hover {
    background-color: #29373d;
  }
    </style>
</head>
<body>
    <header>
        <h1>Create New Job</h1>
    </header>
    <nav>
        <!-- Navigation links for employer dashboard -->
    </nav>
    <main class="container">
        <section id="create-job">
            <h2>Create New Job</h2>
            <form method="post">
            <label for="job-title">Job Title:</label>
            <input type="text" id="job-title" name="job-title" required>

            <label for="company-name">Company Name:</label>
            <input type="text" id="company-name" name="company-name" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="job-type">Job Type:</label>
            <input type="text" id="job-type" name="job-type">

            <label for="description">Job Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="requirements">Job Requirements:</label>
            <textarea id="requirements" name="requirements" rows="4" required></textarea>

            <label for="application-deadline">Application Deadline:</label>
            <input type="date" id="application-deadline" name="application-deadline" required>

            <button type="submit">Create Job</button>
        </form>
        </section>
    </main>
</body>
</html>
