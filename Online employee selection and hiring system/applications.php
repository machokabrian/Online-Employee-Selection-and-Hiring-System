<!DOCTYPE html>
<html>
<head>
    <title>Job Applications</title>
    <style>
       /* Reset some default styles */
body, h1, p {
    margin: 0;
    padding: 0;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

/* Header styles */
h1 {
    text-align: center;
    padding: 20px;
    color: #333;
}

/* Table styles */
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
    color: #333;
}

tr:nth-child(even) {
    background-color: #f8f8f8;
}

tr:hover {
    background-color: #e0e0e0;
}

/* Link styles */
a {
    text-decoration: none;
    color: #337ab7;
}

a:hover {
    text-decoration: underline;
}

/* Action link styles */
.action-links a {
    margin-right: 10px;
    color: #555;
}

.action-links a:hover {
    color: #333;
}

/* Paragraph styles */
p {
    text-align: center;
    margin-top: 20px;
    color: #777;
}

/* Navigation bar styles */
.navbar {
    background-color: #333;
    overflow: hidden;
}

.navbar a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
}

    </style>
</head>
<body>
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

    // Fetch job applications data from database
    $sql = "SELECT id, name, email, phone, cover_letter, job_title, message, submission_date FROM applications";
    $result = $conn->query($sql);

    // Display job applications
    echo '<h1>Job Applications</h1>';

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Cover Letter</th><th>Job Title</th><th>Message</th><th>Submission Date</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['phone'] . '</td>';
            echo '<td>' . $row['cover_letter'] . '</td>';
            echo '<td>' . $row['job_title'] . '</td>';
            echo '<td>' . $row['message'] . '</td>';
            echo '<td>' . $row['submission_date'] . '</td>';
            echo '</tr>';

            echo '<td><a href="schedule_interview.php?id=' . $row['id'] . '">Schedule Interview</a> | <a href="review_application.php?id=' . $row['id'] . '">Review Application</a> | <a href="make_decision.php?id=' . $row['id'] . '">Make Decision</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No job applications yet.</p>';
    }

    // Close connection
    $conn->close();
    ?>

    <!-- Include any additional HTML content or elements here -->

    <p><a href="admin_dashboard.php">Back to Dashboard</a></p>

    <!-- Include your JavaScript or other scripts here -->
</body>
</html>
