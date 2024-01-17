<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Settings</title>
    <style>
        /* Reset some default styles */
body, h1, h2, p, form {
    margin: 0;
    padding: 0;
}

/* Basic styling for the container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Header and navigation styling */
header, nav {
    background-color: #333;
    color: white;
    padding: 10px 0;
    text-align: center;
}

nav ul {
    list-style: none;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
}

/* Form styling */
form {
    margin-top: 20px;
}

label, input, button {
    display: block;
    margin-bottom: 10px;
}

button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 8px 15px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

/* Responsive styling */
@media (max-width: 768px) {
    label, input, button {
        width: 100%;
    }
}

    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="applications.php">Applications</a></li>
            <li><a href="settings.php">Settings</a></li>
            <!-- Add more navigation links as needed -->
        </ul>
    </nav>
    <main class="container">
        <section id="settings">
            <h2>Settings</h2>
            <form action="save_settings.php" method="post">
                <label for="site_name">Site Name:</label>
                <input type="text" name="site_name" id="site_name" value="Your Site Name">

                <label for="contact_email">Contact Email:</label>
                <input type="email" name="contact_email" id="contact_email" value="contact@example.com">

                <!-- Add more settings fields as needed -->

                <button type="submit">Save Settings</button>
            </form>
        </section>
    </main>
</body>
</html>
