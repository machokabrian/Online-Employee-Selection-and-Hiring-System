<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM jobpostings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <style>
       
       body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 1rem;
    }

    main {
        padding: 2rem;
    }

    #job-listings {
        max-width: 800px;
        margin: 0 auto;
    }

    .job-listing {
        border: 1px solid #ccc;
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 5px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .job-listing h3 {
        margin: 0;
    }

    .job-listing p {
        margin: 0.5rem 0;
    }

    .job-listing a {
        display: inline-block;
        background-color: #333;
        color: #fff;
        padding: 0.5rem 1rem;
        text-decoration: none;
        border-radius: 3px;
        margin-top: 0.5rem;
    }

    .job-listing a:hover {
        background-color: #555;
    }

    footer {
        text-align: center;
        background-color: #333;
        color: #fff;
        padding: 0.5rem;
    }


    </style>
</head>
<body>
    <header>
        <h1>Job Listings</h1>
    </header>
    <main>
        <section id="job-listings">
            <h2>Available Jobs</h2>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="job-listing">';
                    echo '<h3>' . $row["job_title"] . '</h3>';
                    echo '<pCompany Name>' . $row["company_name"] . '</p>';
                    echo '<pLocation:>' . $row["location"] . '</p>';
                    echo '<p>Job Type:' . $row["job_type"] . '</p>';
                    echo '<p>Descriptions:' . $row["description"] . '</p>';
                    echo '<p>Requirements:'  . $row["requirements"] . '</p>';
                    echo '<p>Application Deadline: ' . $row["application_deadline"] . '</p>';
                    echo '<a href="apply.php?id=' . $row["id"] . '">Apply</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>No job listings available.</p>';
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Job Listings</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
