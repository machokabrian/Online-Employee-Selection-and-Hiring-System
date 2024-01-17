<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Registration</title>
    <style>
            body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"],
input[type="email"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin-bottom: 10px;
}

button {
    background-color: #333;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #555;
}

.login-link {
    text-align: center;
    margin-top: 10px;
}

.login-link a {
    color: #333;
    text-decoration: none;
}

.login-link a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <section class="container">
        <h2>Employer Registration</h2>
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
            $companyName = $_POST["company-name"];
            $username = $_POST["username"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
            $email = $_POST["email"];

            $sql = "INSERT INTO employers (company_name, username, password, email) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $companyName, $username, $password, $email);

            if ($stmt->execute()) {
                $message = "Registration successful! You can now login.";
            } else {
                $message = "Error registering employer: " . $conn->error;
            }

            $stmt->close();
        }

        $conn->close();
        ?>
        <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
        <form method="post">
            <label for="company-name">Company Name:</label>
            <input type="text" id="company-name" name="company-name" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Register</button>
        </form>

        <p class="login-link">Already have an account? <a href="login_employer.php">Login</a></p>
    </section>
</body>
</html>
