<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job Posting</title>
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
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = $_POST["id"];
        $jobTitle = $_POST["job-title"];
        $companyName = $_POST["company-name"];
        $location = $_POST["location"];
        $jobType = $_POST["job-type"];
        $description = $_POST["description"];
        $requirements = $_POST["requirements"];
        $applicationDeadline = $_POST["application-deadline"];

        $updateSql = "UPDATE jobpostings SET job_title = ?, company_name = ?, location = ?, job_type = ?, description = ?, requirements = ?, application_deadline = ? WHERE id = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("sssssssi", $jobTitle, $companyName, $location, $jobType, $description, $requirements, $applicationDeadline, $id);
        
        if ($stmt->execute()) {
            echo "Job updated successfully!";
             // Show the alert and redirect
        echo "<script>
        alert('Job updated successfully.');
        window.location.href = 'job_posting.php';
            </script>";
        } 
        
        else {
            echo "Error updating job: " . $stmt->error;

            
        }
        $stmt->close();
    }

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $selectSql = "SELECT * FROM jobpostings WHERE id = ?";
        $stmt = $conn->prepare($selectSql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>

            <div class="container">
                <h1>Edit Job Posting</h1>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                    <label for="job-title">Job Title:</label>
                    <input type="text" id="job-title" name="job-title" value="<?php echo $row["job_title"]; ?>" required>

                    <label for="company-name">Company Name:</label>
                    <input type="text" id="company-name" name="company-name" value="<?php echo $row["company_name"]; ?>" required>

                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" value="<?php echo $row["location"]; ?>" required>

                    <label for="job-type">Job Type:</label>
                    <input type="text" id="job-type" name="job-type" value="<?php echo $row["job_type"]; ?>">

                    <label for="description">Job Description:</label>
                    <textarea id="description" name="description" rows="4" required><?php echo $row["description"]; ?></textarea>

                    <label for="requirements">Job Requirements:</label>
                    <textarea id="requirements" name="requirements" rows="4" required><?php echo $row["requirements"]; ?></textarea>

                    <label for="application-deadline">Application Deadline:</label>
                    <input type="date" id="application-deadline" name="application-deadline" value="<?php echo $row["application_deadline"]; ?>" required>

                    <button type="submit">Save Changes</button>
                </form>
            </div>

            <?php



        } else {
            echo "Job not found.";
   
        } 
        
        $stmt->close();
    }

    $conn->close();
    
    ?>
</body>
</html>
