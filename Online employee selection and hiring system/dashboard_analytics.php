<!DOCTYPE html>
<html>
<head>
    <title>Job Analytics Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        .analytics {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .metric {
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .metric h2 {
            margin-top: 0;
        }

        .metric p {
            margin: 10px 0 0;
            font-size: 20px;
        }

        .metric .value {
            font-size: 40px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Job Analytics Page</h1>

    <div class="analytics">
        <?php
        // Connect to your database here
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database_name";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch job analytics data from the database
        $sql = "SELECT COUNT(*) AS total_jobs FROM job_postings";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totalJobs = $row["total_jobs"];

        $sql = "SELECT COUNT(*) AS total_applications FROM job_applications";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totalApplications = $row["total_applications"];

        $sql = "SELECT category, COUNT(*) AS category_count FROM job_postings GROUP BY category";
        $result = $conn->query($sql);
        $categories = [];
        while ($row = $result->fetch_assoc()) {
            $categories[$row["category"]] = $row["category_count"];
        }

        // Display the job analytics metrics
        echo '<div class="metric">';
        echo '<h2>Total Job Postings</h2>';
        echo '<p class="value">' . $totalJobs . '</p>';
        echo '</div>';

        echo '<div class="metric">';
        echo '<h2>Total Applications</h2>';
        echo '<p class="value">' . $totalApplications . '</p>';
        echo '</div>';

        echo '<div class="metric">';
        echo '<h2>Job Categories</h2>';
        echo '<ul>';
        foreach ($categories as $category => $count) {
            echo '<li>' . $category . ' - ' . $count . '</li>';
        }
        echo '</ul>';
        echo '</div>';

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
