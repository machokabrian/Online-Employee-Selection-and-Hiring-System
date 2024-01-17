<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_GET["id"]; // Get the user ID from the URL parameter
    $email = $_POST["email"];
    $username = $_POST["username"];
    $skills = $_POST["skills"];
    $role = $_POST["role"];
    $status = $_POST["status"];

    $updateSql = "UPDATE jobseeker SET email = ?, username = ?, skills = ?, role = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("sssssi", $email,  $username,  $skills, $role, $status, $id);
    
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: candidate_profile.php"); 
        exit();
    } else {
        echo "Error updating candidate: " . $stmt->error;
    }
    $stmt->close();
}

$id = $_GET["id"];
$selectSql = "SELECT * FROM jobseeker WHERE id = ?";
$stmt = $conn->prepare($selectSql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit User - Job Seeker Dashboard</title>
<style>
    /* Reset some default styles */
body, h1, h2, h3, p, ul, li, form, label, input, select, button {
  margin: 0;
  padding: 0;
  border: 0;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
}

header {
  background-color: #35424a;
  color: white;
  text-align: center;
  padding: 10px;
}

nav {
  background-color: #29373d;
  color: white;
  padding: 10px;
}

nav ul {
  list-style-type: none;
}

nav li {
  margin-bottom: 5px;
}

nav a {
  text-decoration: none;
  color: black;
}

.container {
  max-width: 1200px;
  margin: 20px auto;
  padding: 20px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

section {
  margin-bottom: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
}

form {
  display: grid;
  gap: 10px;
  max-width: 400px;
  margin: 0 auto;
}

label {
  font-weight: bold;
}

input[type="text"],
input[type="email"],
select {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

select {
  appearance: none;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: white;
  cursor: pointer;
}

button {
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

/* Responsive styles for small screens */
@media (max-width: 768px) {
  header, nav, .container, section, form {
    padding: 10px;
  }
}

</style>
</head>
<body>
  <header>
    <h1>Admin Dashboard</h1>
  </header>
  <nav>
   
  <div class="container">
    <section id="edit-user">
      <h2>Edit Job Seeker</h2>
      <form method="post">
      <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        <label for="username">Username:</label>
        <br>
        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
        <br>
        <label for="skills">Skills:</label>
                <input type="text" id="skills" name="skills"  value="<?php echo $user['skills']; ?>" required>
        <br>
        <label for="role">Role:</label>
        <select id="role" name="role" required>
          <option value="Admin" <?php if ($user['role'] === 'Admin') echo 'selected'; ?>>Admin</option>
          <option value="Employer" <?php if ($user['role'] === 'Employer') echo 'selected'; ?>>Employer</option>
          <option value="Job Seeker" <?php if ($user['role'] === 'Job Seeker') echo 'selected'; ?>>Job Seeker</option>
        </select>
        <br>
        <label for="status">Status:</label>
        <select id="status" name="status" required>
          <option value="Active" <?php if ($user['status'] === 'Active') echo 'selected'; ?>>Active</option>
          <option value="Inactive" <?php if ($user['status'] === 'Inactive') echo 'selected'; ?>>Inactive</option>
        </select>
        <br>
        <button type="submit">Save Changes</button>
      </form>
    </section>
  </div>
</body>
</html>

