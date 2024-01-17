<!DOCTYPE html>
<html>
<head>
    <title>Add New Job Vacancy</title>
    <style>
        /* Add your custom CSS styling here */
        /* Styling for the form container */
        .form-container {
            width: 400px;
            margin: 0 auto;
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
        }

        /* Styling for the form fields */
        .form-container input[type="text"],
        .form-container select,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        /* Styling for the form buttons */
        .form-container input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>


<script src="script.js"></script>
</head>
<body>
    <div class="form-container">
        <h2>Add New Job Vacancy</h2>
        <form method="post" action="process_add_job.php">
            <label for="job-title">Job Title:</label>
            <input type="text" id="job-title" name="job_title" required>

            <label for="company-name">Company Name:</label>
            <input type="text" id="company-name" name="company_name" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="salary">Salary or Compensation:</label>
            <input type="text" id="salary" name="salary" required>

            <label for="job-type">Job Type:</label>
            <select id="job-type" name="job_type" required>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Contract">Contract</option>
                <option value="Internship">Internship</option>
            </select>

            <label for="description">Job Description:</label>
            <textarea id="description" name="description" rows="5" required></textarea>

            <label for="deadline">Application Deadline:</label>
            <input type="date" id="deadline" name="deadline" required>

            <input type="submit" value="Add Vacancy">
        </form>
    </div>

    
</body>
</html>
