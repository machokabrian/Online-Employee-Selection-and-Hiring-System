<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <!-- Add your CSS styles here -->
    <style>
        /* Your CSS styles go here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        
        form {
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }
        form label,
        form input,
        form textarea {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
            padding: 5px;
        }
        form textarea {
            height: 150px;
        }
        form button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <p>If you have any questions or need assistance with our employee selection and hiring system, please feel free to contact us using the form below.</p>

        
    </header>

    
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

    
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Send Message</button>
    </form>

</body>
</html>
