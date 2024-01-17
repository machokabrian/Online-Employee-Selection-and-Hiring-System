<!DOCTYPE html>
<html>
<head>
    <title>Applicant Tracking Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
            color: #fff;
        }

        .received {
            background-color: #3498DB;
        }

        .review {
            background-color: #9B59B6;
        }

        .interview {
            background-color: #27AE60;
        }

        .offer {
            background-color: #F39C12;
        }

        .rejected {
            background-color: #E74C3C;
        }
    </style>
</head>
<body>
    <h1>Applicant Tracking Page</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Status</th>
        </tr>

        <?php
        // Connect to your database here
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database_name";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve applicant data from the database
        $sql = "SELECT * FROM applicants";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $statusClass = strtolower(str_replace(' ', '-', $row["status"]));
                echo "<tr>
        
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["phone"] . "</td>
                        <td><span class='status $statusClass'>" . $row["status"] . "</span></td>
                    </tr>";
            }
        } else {
            echo "<tr>
                    <td colspan='4'>No applicants found.</td>
                </tr>";
        }

        // Close the database connection
        $conn->close();
        ?>

    </table>
</body>
</html>
