<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        /* styles.css */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

form {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    appearance: none;
    background: url('arrow-down.svg') no-repeat right;
    background-size: 20px;
    background-position: 95% center;
}

textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button[type="submit"] {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

button[type="submit"]:focus {
    outline: none;
}

button[type="submit"]:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>My Profile</h2>
        <?php
        // Include necessary configuration and database connection

        session_start();

        // Check if job seeker is logged in
        if (!isset($_SESSION['job_seeker_id'])) {
            header('Location: candidate_login.php'); // Redirect to login page
            exit;
        }

        // Fetch job seeker's profile data from the database
        // Implement the necessary database query to fetch job seeker data

        // Example data for demonstration
        $user = [
            'email' => 'example@email.com',
            'fullname' => 'John Doe',
            'skills' => 'Web Development',
            // Add other fields as needed
        ];
        ?>
        
        <form method="post" action="update_profile.php">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            <br>
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>" required>
            <br>
            <label for="skills">Skills:</label>
            <input type="text" id="skills" name="skills" value="<?php echo $user['skills']; ?>" required>
            <br>
            <!-- Add more fields as needed -->
            <button type="submit">Update Profile</button>
        </form>
        
        <form method="post" action="delete_profile.php">
            <button type="submit" onclick="return confirm('Are you sure you want to delete your profile?')">Delete Profile</button>
        </form>
    </div>
</body>
</html>
