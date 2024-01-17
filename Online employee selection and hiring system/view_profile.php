<!DOCTYPE html>
<html>
<head>
    <title>Candidate Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        h2 {
            color: #666;
        }
        p {
            margin-bottom: 10px;
        }
        ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
    // Replace with your PHP code to fetch candidate data from the database based on the candidate ID or any other identifier
    // For this example, we'll use sample data
    $candidateID = 1;

    // Replace the following with your database connection credentials
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch candidate's profile data
    $sql = "SELECT * FROM candidates WHERE id = $candidateID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $candidate = $result->fetch_assoc();
    } else {
        echo "Candidate not found.";
        exit;
    }

    // Close the database connection
    $conn->close();
    ?>

    <div class="container">
        <h1>Candidate Profile</h1>
        <h2><?php echo $candidate['name']; ?></h2>
        <p>Email: <?php echo $candidate['email']; ?></p>
        <p>Phone: <?php echo $candidate['phone']; ?></p>
        <p>Address: <?php echo $candidate['address']; ?></p>

        <h2>Education</h2>
        <ul>
            <?php foreach ($candidate['education'] as $education): ?>
                <li><?php echo $education['degree']; ?> - <?php echo $education['university']; ?> (<?php echo $education['year']; ?>)</li>
            <?php endforeach; ?>
        </ul>

        <h2>Work Experience</h2>
        <ul>
            <?php foreach ($candidate['work_experience'] as $experience): ?>
                <li><?php echo $experience['position']; ?> at <?php echo $experience['company']; ?> (<?php echo $experience['duration']; ?>)</li>
            <?php endforeach; ?>
        </ul>

        <h2>Skills</h2>
        <ul>
            <?php foreach ($candidate['skills'] as $skill): ?>
                <li><?php echo $skill; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
