<!DOCTYPE html>
<html>
<head>
    <title>Candidate Profiles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .profile {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .profile h2 {
            color: #666;
            margin-bottom: 5px;
        }
        .profile p {
            margin-bottom: 5px;
        }
        .profile a {
            text-decoration: none;
            color: #4CAF50;
        }
        .profile a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    // Replace with your PHP code to fetch candidate profiles from the database
    // For this example, we'll use sample data
    $candidates = [
        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '123-456-7890'],
        ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'phone' => '987-654-3210'],
        // ... additional candidate profiles
    ];
    ?>

    <div class="container">
        <h1>Candidate Profiles</h1>
        <?php foreach ($candidates as $candidate): ?>
            <div class="profile">
                <h2><?php echo $candidate['name']; ?></h2>
                <p>Email: <?php echo $candidate['email']; ?></p>
                <p>Phone: <?php echo $candidate['phone']; ?></p>
                <a href="view_profile.php?id=<?php echo $candidate['id']; ?>">View Profile</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
