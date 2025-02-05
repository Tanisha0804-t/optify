<?php
session_start();

// ... (Database connection code as in the previous example) ...

if (!isset($_SESSION['company_id'])) {
    // If not logged in, redirect to company login page
    header("Location: company_login.php"); 
    exit;
}

$company_id = $_SESSION['company_id'];

// Fetch company details
$sql = "SELECT * FROM companies WHERE id = '$company_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $company_name = $row['company_name'];
} else {
    // Handle error if company not found
    echo "Company not found.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Optify - Company Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>

    <div class="container">
        <h1>Welcome, <?php echo $company_name; ?></h1>

        <h2>Your Posted Jobs</h2>
        <table border="1">
            <tr>
                <th>Job Title</th>
                <th>Location</th>
                <th>View Applicants</th>
            </tr>
            <?php
            // ... (Fetch and display jobs as in the previous example) ...
            ?>
        </table>
    </div>

</body>
</html>