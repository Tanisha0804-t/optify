<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "optify";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$job_title = isset($_POST["job_title"]) ? $_POST["job_title"] : "";
$company_name = isset($_POST["company_name"]) ? $_POST["company_name"] : "";
$job_description = isset($_POST["job_description"]) ? $_POST["job_description"] : "";
$location = isset($_POST["location"]) ? $_POST["location"] : "";
$experience = isset($_POST["experience"]) ? $_POST["experience"] : 0;
$salary = isset($_POST["salary"]) ? $_POST["salary"] : "";

// Insert data into database
$sql = "INSERT INTO post_job (job_title, company_name, job_description, location, experience, salary) 
        VALUES ('$job_title', '$company_name', '$job_description', '$location', '$experience', '$salary')";

if ($conn->query($sql) === TRUE) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Job Posted Successfully</title>
        <style>
            body {
                font-family: sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background-color: #151B26; /* Dark Blue Background */
            }

            .container {
                background-color: #242932; /* Slightly lighter shade for contrast */
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                text-align: center;
            }

            h1 {
                color: #4CAF50; /* Green color */
                font-weight: bold;
                animation: pulse 1s infinite;
            }

            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.1); }
                100% { transform: scale(1); }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Job Posted Successfully!</h1>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>