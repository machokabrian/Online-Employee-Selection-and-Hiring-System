<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Employee Selection and Hiring System</title>
    <!-- Add your CSS styles here or link an external stylesheet -->
    <style>
  /* Reset some default styles */
body, h1, h2, p, ul, li {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

header {
    background-color: #337ab7;
    color: #fff;
    text-align: center;
    padding: 10px 0;
}

nav {
    background-color: #444;
    color: #fff;
}

nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
    padding: 10px 0;
}

nav li {
    margin: 0 20px;
}

nav a {
    text-decoration: none;
    color: #fff;
}

.hero-section {
    background-image: url('hero-bg.jpg'); /* Replace with your image path */
    background-size: cover;
    text-align: center;
    padding: 100px 0;
    color: black;
}

.cta-btn {
    display: inline-block;
    margin: 10px;
    padding: 12px 20px;
    background-color: #337ab7;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
}

.benefits-section {
    text-align: center;
    padding: 50px 0;
}

.benefits-section h2 {
    margin-bottom: 20px;
}

.benefits-section ul {
    list-style: none;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.benefits-section li {
    margin: 10px;
    width: 300px;
}

footer {
    background-color: #444;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

footer ul {
    list-style: none;
    margin-bottom: 10px;
}

footer a {
    text-decoration: none;
    color: #fff;
    margin: 0 10px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    nav ul {
        flex-direction: column;
        align-items: center;
    }
    
    nav li {
        margin: 10px 0;
    }
    
    .benefits-section ul {
        flex-direction: column;
    }
    
    .benefits-section li {
        width: 100%;
    }
}


    </style>
</head>
<body>
    
    <header>
        <h1>Online Employee Selection and Hiring System</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="candidate_applications.php">Job Listings</a></li>
            <li><a href="about_us.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <div class="hero-section">
        <h2>Find Your Dream Job</h2>
        <a href="register_candidate.php" class="cta-btn">Find a Job</a>
        <a href="register_employer.php" class="cta-btn">Post a Job</a>
    </div>

    <div class="benefits-section">
        <h2>Benefits for Job Seekers</h2>
        <ul>
            <li>Access to a wide range of job opportunities</li>
            <li>User-friendly interface for easy job search</li>
            <li>Apply to jobs with just a few clicks</li>
            <!-- Add more benefits as needed -->
        </ul>

        <h2>Benefits for Employers</h2>
        <ul>
            <li>Reach a large pool of qualified candidates</li>
            <li>Efficiently manage job listings and applications</li>
            <li>Streamlined hiring process</li>
            <!-- Add more benefits as needed -->
        </ul>
    </div>

    

    <footer>
        <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">FAQ</a></li>
        </ul>
        <p>Contact: onlineemployee@gmail.com</p>
    </footer>
</body>
</html>

