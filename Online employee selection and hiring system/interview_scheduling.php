
<!DOCTYPE html>
<html>
<head>
    <title>Interview Scheduling</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>








    <?php

    // Replace with your PHP code to handle form submission and database insertion
    
    // For this example, we'll use sample data
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $candidateName = $_POST["candidate_name"];
        $interviewDate = $_POST["interview_date"];
        $interviewTime = $_POST["interview_time"];

        // Save the interview schedule to the database (replace with your database insertion code)
        // Example: $conn->query("INSERT INTO interview_schedule (candidate_name, interview_date, interview_time) VALUES ('$candidateName', '$interviewDate', '$interviewTime')");
        
        // Redirect the user to a thank-you page or display a success message
        // Example: header("Location: thank_you.php");
        exit;
    }
    ?>

    <div class="container">
        <h1>Interview Scheduling</h1>
        <form method="post" action="" method>
            <label for="candidate_name">Candidate Name:</label>
            <input type="text" id="candidate_name" name="candidate_name" required>

            <label for="interview_date">Interview Date:</label>
            <input type="date" id="interview_date" name="interview_date" required>
<br>
<br>
            <label for="interview_time">Interview Time:</label>
            <input type="time" id="interview_time" name="interview_time" required>

<br>
<br>
            <input type="submit" value="Schedule Interview">
        </form>
    </div><script src="script.js"></script>
    <script src="script.js"></script>
</body>
</html>
