<!DOCTYPE html>
<html>
<head>
    <title>Scheduled Interviews</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            padding: 20px;
            font-size: 24px;
        }

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
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        tbody tr:hover {
            background-color: #e0e0e0;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
            margin-top: 20px;
        }

        li {
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #337ab7;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            text-align: center;
            margin-top: 20px;
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

    // Fetch scheduled interview details
    $sql = "SELECT * FROM interviews";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead><tr><th>Application ID</th><th>Interview Date</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['application_id'] . "</td><td>" . $row['interview_date'] . "</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No scheduled interviews found.";
        echo "No application reviews found.";
    }
 // Fetch application reviews
 $sql = "SELECT * FROM application_reviews";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     echo "<ul>";
     while ($row = $result->fetch_assoc()) {
         echo "<li>Application ID: " . $row['application_id'] . "<br>";
         echo "Review: " . $row['review'] . "</li>";
     }
    
 } 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the decision table
$sql = "SELECT application_id, final_decision FROM decision";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $applicationId = $row["application_id"];
        $finalDecision = $row["final_decision"];

        echo "Application ID: $applicationId, Final Decision: $finalDecision<br>";
    }
} else {
    echo "No records found.";
}

    // Close connection
    $conn->close();
    ?>

    <p><a href="candidate_dashboard.php">Back to Job Seeker Dashboard</a></p>
</body>
</html>
