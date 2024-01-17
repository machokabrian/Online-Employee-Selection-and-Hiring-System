<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
    <style>
        /* Add custom CSS styles for the registration page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .login-link {
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Registration</h1>
        <form action="register_admin_process.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            
            <!-- Additional admin registration fields -->
            
            <input type="submit" name="register" value="Register">
        </form>
        
        <p class="login-link">Already have an account? <a href="login_admin.php">Login</a></p>
    </div>
</body>
</html>
