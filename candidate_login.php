<?php
session_start();

if (isset($_POST['candidate_login'])) {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection (replace with your actual connection details)
    include 'database1.php';

    // SQL query to check if the candidate exists
    $sql = "SELECT * FROM candidate_signup WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Login successful
            $_SESSION['candidate_id'] = $row['id']; 
            $_SESSION['candidate_name'] = $row['name']; 

            header("Location: candidate_dashboard.php"); // Redirect to dashboard
            exit(); 
        } else {
            // Invalid password
            echo "<script>alert('Invalid email or password.');</script>";
        }
    } else {
        // Invalid email
        echo "<script>alert('Invalid email or password.');</script>";
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Optify - Candidate Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="candi.css"> 
</head>
<body>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mx-auto">
                <div class="login-box">
                    <h2 class="mb-4 text-center">Candidate Login</h2>
                    <?php if(isset($error_message)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
                        <div class="form-group">
                            <label for="candidate_email">Email</label>
                            <input type="email" id="candidate_email" name="candidate_email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="candidate_password">Password</label>
                            <input type="password" id="candidate_password" name="candidate_password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <button type="submit" name="candidate_login" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>