<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Login</title>
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
input[type="password"] {
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

.register-link {
    text-align: center;
    margin-top: 10px;
}

.register-link a {
    color: #333;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <section class="container">
        <h2>Employer Login</h2>
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
            $username = $_POST["username"];
            $password = $_POST["password"];

            $sql = "SELECT id, username, password FROM employers WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row["password"])) {
                    session_start();
                    $_SESSION["employer_id"] = $row["id"];
                    header("Location: admin_dashboard.php"); // Redirect to employer dashboard
                    exit();
                } else {
                    $message = "Invalid password.";
                }
            } else {
                $message = "Invalid username.";
            }

            $stmt->close();
        }

        $conn->close();
        ?>
        <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <p class="register-link">Don't have an account? <a href="register_employer.php">Register</a></p>
    </section>
</body>
</html>
