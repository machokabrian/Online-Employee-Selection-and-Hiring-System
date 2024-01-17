<?php
    // Check if the form is submitted
    if (isset($_POST["submit"]))
    {
        // Replace 'your_db_host', 'your_db_username', 'your_db_password', and 'your_db_name' with actual database credentials
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'login';

        // Create a database connection
        $conn = new mysqli($host, $username, $password, $dbname);

        // Check if the connection was successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the email and password from the form
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Prepare and execute the SQL query to check if the employer exists in the database
        $sql = "SELECT * FROM employers WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if there is a result
        if ($result->num_rows > 0) {
            // Employer exists, set the employer_id in the session and redirect to the employer_profile.php page
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION['employer_id'] = $row['employer_id'];
            header("Location: employer_profile.php");
            exit;
        } else {
            // Employer not found, display an error message
            echo "Invalid email or password. Please try again.";
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    }
    ?>