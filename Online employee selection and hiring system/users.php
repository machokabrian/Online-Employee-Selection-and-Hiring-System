<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
    
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
    }
   
    .back-to-dashboard {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .back-to-dashboard:hover {
            color: #0056b3;
        }


    .success {
        color: #009900;
    }

    .error {
        color: #ff0000;
    }

    .user-list {
        margin-top: 20px;
    }

    .user {
        padding: 10px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
        background-color: #f9f9f9;
    }

    .user h2 {
        margin-top: 0;
    }

    .delete-btn {
        color: #ff0000;
        margin-left: 10px;
        text-decoration: none;
    }

    .user-form {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    select {
        height: 34px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    





</style>

    </style>
</head>
<body>
    <div class="container">
        <h1>Employer Management</h1>
        
        <?php

        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "system";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

  

        // Handle user deletion
        if (isset($_GET["delete"])) {
            $deleteId = $_GET["delete"];
            $sqlDelete = "DELETE FROM user WHERE id = $deleteId";
            if ($conn->query($sqlDelete) === TRUE) {
                echo "<p class='success'>User deleted successfully.</p>";
            } else {
                echo "<p class='error'>Error deleting user: " . $conn->error . "</p>";
            }
        }

        // Handle user submission
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $role = $_POST["role"];
            $status = $_POST["status"];

            $sqlInsert = "INSERT INTO user (username, email, role, status) VALUES ('$username', '$email', '$role', '$status')";
            if ($conn->query($sqlInsert) === TRUE) {
                echo "<p class='success'>User added successfully.</p>";


            } else {
                echo "<p class='error'>Error adding user: " . $conn->error . "</p>";
            }
        }

        // Fetch users from database
        $sqlSelect = "SELECT * FROM user";
        $result = $conn->query($sqlSelect);

        if ($result->num_rows > 0) {
            echo "<div class='user-list'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='user'>";
                echo "<h2>" . $row["username"] . "</h2>";
                echo "<p>Email: " . $row["email"] . "</p>";
                echo "<p>Role: " . $row["role"] . "</p>";
                echo "<p>Status: " . $row["status"] . "</p>";
                echo "<a href='edit_user.php?id=" . $row["id"] . "'>Edit</a>";
                echo "<a href='users.php?delete=" . $row["id"] . "' class='delete-btn'>Delete</a>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p>No users available.</p>";
        }

        $conn->close();
        ?>

        <div class="user-form">
            <h2>Add New Employer</h2>
            <form method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    
                    <option value="Employer">Employer</option>
                    <option value="Job Seeker">Job Seeker</option>
                </select>
                <br>
                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <br>
                <button type="submit">Add User</button>
                
            </form>
        </div>
        <a href="admin_dashboard.php">Back to Dashboard</a>
    </div>
    
</body>
</html>
