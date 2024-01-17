<!DOCTYPE html>
<html>
<head>
    <title>Make Final Decision</title>
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

        select, button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #337ab7;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #23527c;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #337ab7;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Make Final Decision</h1>

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

        // Insert final decision record into the database
        $sql = "INSERT INTO decision (application_id, final_decision) VALUES ('$applicationId', '$finalDecision')";

        if ($conn->query($sql) === TRUE) {
            echo "Final decision made successfully!";
        } else {
            echo "Error making final decision: " . $conn->error;
        }
    }

    // Close connection
    $conn->close();
    ?>

    <form method="post" action="make_decision.php">
        <input type="hidden" name="application_id" value="<?php echo $_GET['id']; ?>">
        <label for="final_decision">Final Decision:</label>
        <select name="final_decision" required>
            <option value="accepted">Accepted</option>
            <option value="rejected">Rejected</option>
        </select>
        <button type="submit">Make Final Decision</button>
    </form>

    <p><a href="applications.php">Back to Job Applications</a></p>
</body>
</html>
