<?php
session_start();

// ... (Database connection code as in the previous example) ...

if (!isset($_SESSION['candidate_id'])) {
    // If not logged in, redirect to candidate login page
    header("Location: candidate_login.php"); 
    exit;
}

$candidate_id = $_SESSION['candidate_id'];

// Fetch candidate details and number of applied jobs (implement logic here)
// ...

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Optify - Candidate Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>

    <div class="container">
        <h1>Welcome, [Candidate Name]</h1>

        <p>You have applied for <span id="job_count">0</span> jobs.</p> 

        </div>

</body>
</html>