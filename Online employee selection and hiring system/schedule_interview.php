<!DOCTYPE html>
<html>
<head>
    <title>Schedule Interview</title>
    <style>
           body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #337ab7;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #23527c;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #337ab7;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Additional styles for responsiveness */
        @media (max-width: 768px) {
            form {
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <h1>Schedule Interview</h1>

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
        
        $interviewDate = $_POST['interview_date'];
        
        // Insert interview record into the database
        $sql = "INSERT INTO interviews ( interview_date) VALUES ( '$interviewDate')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Interview scheduled successfully!";
        } else {
            echo "Error scheduling interview: " . $conn->error;
        }
    }

    // Close connection
    $conn->close();
    ?>

    <form method="post" action="schedule_interview.php">
        
        <label for="interview_date">Interview Date:</label>


        <input type="date" name="interview_date" required>
        <button type="submit">Schedule Interview</button>
    </form>

    <p><a href="applications.php">Back to Job Applications</a></p>
</body>
</html>
