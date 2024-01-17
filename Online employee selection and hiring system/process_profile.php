<?php
// Step 1: Set up a database connection
$servername = "your_database_servername";
$username = "your_database_username";
$password = "your_database_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $companyName = $_POST["company_name"];
    $location = $_POST["location"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $website = $_POST["website"];
    $aboutUs = $_POST["about_us"];
    $industry = $_POST["industry"];
    $companySize = $_POST["company_size"];
    $foundedYear = $_POST["founded_year"];
    $socialMedia = $_POST["social_media"];
    $missionVision = $_POST["mission_vision"];
    $employeeTestimonials = $_POST["employee_testimonials"];
    $contactInfo = $_POST["contact_info"];

    // Step 3: Validate data (optional)
    // You can perform data validation here if needed

    // Step 4: Insert data into the database
    $sql = "INSERT INTO employer_profiles (company_name, location, email, phone, website, about_us, industry, company_size, founded_year, social_media, mission_vision, employee_testimonials, contact_info)
            VALUES ('$companyName', '$location', '$email', '$phone', '$website', '$aboutUs', '$industry', '$companySize', '$foundedYear', '$socialMedia', '$missionVision', '$employeeTestimonials', '$contactInfo')";

    if ($conn->query($sql) === TRUE) {
        echo "Employer profile saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
