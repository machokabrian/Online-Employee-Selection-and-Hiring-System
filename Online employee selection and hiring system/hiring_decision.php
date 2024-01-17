<!DOCTYPE html>
<html>
<head>
    <title>Hiring Decision</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            padding: 20px;
            color: #333;
        }

        h2 {
            margin-top: 10px;
            color: #666;
        }

        p {
            margin-top: 5px;
            color: #777;
        }

        form {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #337ab7;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #23527c;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #337ab7;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    // Database connection details (same as applications.php)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "system";

    // Create connection (same as applications.php)
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection (same as applications.php)
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the application ID from the URL parameter (same as applications.php)
    if (isset($_GET['application_id'])) {
        $application_id = $_GET['application_id'];
    } else {
        echo '<p>Application ID not specified.</p>';
        exit;
    }

    // Fetch job application data from database (same as applications.php)
    $sql = "SELECT id, name, email, phone, cover_letter, job_title, message, submission_date FROM applications WHERE id = $application_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo '<p>Application not found.</p>';
        exit;
    }

    // Display job application details (same as applications.php)
    echo '<h1>Hiring Decision</h1>';
    echo '<h2>' . $row['job_title'] . '</h2>';
    echo '<p>Name: ' . $row['name'] . '</p>';
    echo '<p>Email: ' . $row['email'] . '</p>';
    echo '<p>Phone: ' . $row['phone'] . '</p>';
    echo '<p>Cover Letter:</p><p>' . $row['cover_letter'] . '</p>';
    echo '<p>Message:</p><p>' . $row['message'] . '</p>';
    echo '<p>Submission Date: ' . $row['submission_date'] . '</p>';

    // Hiring decision form
    echo '<form action="process_decision.php" method="post">';
    echo '<input type="hidden" name="application_id" value="' . $row['id'] . '">';
    echo '<label for="decision">Hiring Decision:</label>';
    echo '<select name="decision" id="decision">';
    echo '<option value="shortlist">Shortlist</option>';
    echo '<option value="reject">Reject</option>';
    echo '<option value="interview">Interview</option>';
    echo '<option value="hire">Hire</option>';
    echo '</select>';
    echo '<br>';
    echo '<label for="notes">Notes:</label><br>';
    echo '<textarea name="notes" id="notes" rows="4" cols="50"></textarea>';
    echo '<br>';
    echo '<input type="submit" value="Submit Decision">';
    echo '</form>';
    ?>

    <!-- Include any additional HTML content or elements here -->

    <p><a href="applications.php">Back to Applications</a></p>

    <!-- Include your JavaScript or other scripts here -->
</body>
</html>
