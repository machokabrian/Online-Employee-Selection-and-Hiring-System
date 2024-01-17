<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employer Dashboard</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }

  header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
  }

  ul {
    list-style-type: none;
    padding: 30px;
    margin: 5px;
    background-color: #444;
    text-align: center;
  }

  li {
    display: inline-block;
    margin-right: 10px;
  }

  a {
    text-decoration: none;
    color: #fff;
    padding: 10px;
    transition: background-color 0.3s ease;
  }

  a:hover {
    background-color: #555;
  }

  .dashboard {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
  }

  .section {
    border: 1px solid #ccc;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    background-color: #f9f9f9;
  }

  h2 {
    margin-top: 0;
  }
</style>
</head>
<body>
  <header>
    <h1>Employer Dashboard</h1>
  </header>
  <ul>
    <li><a href="users.php">Employer Dashboard</a></li>
    <li><a href="job_posting.php">Job Postings</a></li>
    <li><a href="applications.php">Job Applications</a></li>
    
    <li><a href="index.php">Log Out</a></li>
  </ul>
  <div class="dashboard">
    <div class="section">
      <h2>Welcome to  Employer Dashboard</h2>
      <p>This is your centralized hub for managing job postings, applications, hiring decisions, and settings.</p>
    
  </div>
</body>
</html>
