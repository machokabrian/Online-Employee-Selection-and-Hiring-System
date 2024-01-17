<!DOCTYPE html>
<html>
<head>
    <title>Review Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
        }

        button[type="submit"] {
            background-color: #337ab7;
            color: #fff;
            border: none;
            padding: 10px 20px;
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $applicationId = $_POST['application_id'];
        $review = $_POST['review'];
        
        // Perform further processing and validation here
        // Example: Insert the review into the database
        $sql = "INSERT INTO application_reviews (application_id, review) VALUES ('$applicationId', '$review')";
        if ($conn->query($sql) === TRUE) {
            echo "Review submitted successfully!";
        } else {
            echo "Error submitting review: " . $conn->error;
        }
    }

    // Close connection
    $conn->close();
    ?>

    <h1>Review Application</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="application_id" value="<?php echo $_GET['id']; ?>">
        <label for="review">Review:</label>
        <textarea name="review" rows="5" required></textarea>
        <button type="submit">Submit Review</button>
    </form>

    <p><a href="applications.php">Back to Job Applications</a></p>

    <!-- Include your JavaScript or other scripts here -->
</body>
</html>
