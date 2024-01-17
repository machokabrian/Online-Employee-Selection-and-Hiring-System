<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Postings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        main {
            padding: 20px;
        }

        .job-listing {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .job-listing h2 {
            margin: 0;
            font-size: 24px;
        }

        .job-listing p {
            margin: 5px 0;
            font-size: 16px;
        }

        .button-container {
            text-align: right;
            margin-top: 10px;
        }

        .button-container a {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 3px;
            margin-right: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .button-container a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Job Postings</h1>
    </header>
    <main class="container">
        <div class="button-container">
            <a href="create_job.php">Create New Job</a>

        <a href="admin_dashboard.php">Back to Home</a>
        </div>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "system";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);

        }


        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $deleteSql = "DELETE FROM jobpostings WHERE id = ?";
            $stmt = $conn->prepare($deleteSql);
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo "Job deleted successfully.";
            } else {
                echo "Error deleting job: " . $stmt->error;
            }
            $stmt->close();
        }


        $sql = "SELECT * FROM jobpostings";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="job-listing">';
                echo '<h2>' . $row["job_title"] . '</h2>';
                echo '<p>Company: ' . $row["company_name"] . '</p>';
                echo '<p>Location: ' . $row["location"] . '</p>';
                echo '<p>Job Type: ' . $row["job_type"] . '</p>';
                echo '<p>Description: ' . $row["description"] . '</p>';
                echo '<p>Requirements: ' . $row["requirements"] . '</p>';
                echo '<p>Application Deadline: ' . $row["application_deadline"] . '</p>';
                echo '<div class="button-container">';
                echo '<a href="edit_job.php?id=' . $row["id"] . '">Edit</a>';

                echo ' | ';

                echo '<a href="?action=delete&id=' . $row["id"] . '">Delete</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No job postings available.</p>';
            
        }

        $conn->close();
        
        ?>
        
    </main>
</body>
</html>
