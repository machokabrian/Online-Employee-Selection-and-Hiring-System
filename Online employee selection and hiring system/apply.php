<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $coverLetter = $_POST["cover-letter"];
    $jobTitle = $_POST["job-title"];
    $message = $_POST["message"];
    $submissionDate = date("Y-m-d H:i:s");

    $sql = "INSERT INTO applications (name, email, phone, cover_letter, job_title, message, submission_date)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssss",
        $name,
        $email,
        $phone,
        $coverLetter,
        $jobTitle,
        $message,
        $submissionDate
    );

    if ($stmt->execute()) {
        $message = "Application submitted successfully!";
        // Show the alert and redirect
        echo "<script>
        alert('Job updated successfully.');
        window.location.href = 'candidate_dashboard.php';
            </script>";

            
    } else {
        $message = "Error submitting application: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 600px;
    
    margin: 0 auto;
    padding: 2rem;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 0.5rem;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="date"],
textarea {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin-bottom: 1rem;
}

textarea {
    resize: vertical;
}

button {
    background-color: #333;
    color: #fff;
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #555;
}

p {
    margin: 0;
    margin-top: 1rem;
    color: #555;
}

    </style>
</head>
<body>
    <section class="container">
        <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="cover-letter">Cover Letter:</label>
            <textarea id="cover-letter" name="cover-letter" required></textarea>

            <label for="job-title">Job Title:</label>
            <input type="text" id="job-title" name="job-title" required>

            <label for="message">Message (Optional):</label>
            <textarea id="message" name="message"></textarea>

            <label for="submission-date">Submission Date:</label>
            <input type="date" id="submission-date" name="submission-date" required>

            <button type="submit">Submit Application</button>
        </form>
    </section>
</body>
</html>
