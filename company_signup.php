<?php
if (isset($_POST['company_signup'])) {
    // Get form data
    $company_name = $_POST['company_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection (replace with your actual connection details)
    include 'database1.php';

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert company data into the database
    $sql = "INSERT INTO company_signup (company_name, email, password) VALUES ('$company_name', '$email', '$hashed_password')"; 

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        echo "<script>alert('Registration successful!');</script>";
        header("Location: company_login.php"); 
        exit;
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Optify - Company Signup</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="signup.css"> 
</head>
<body>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mx-auto">
                <div class="login-box">
                    <h2 class="mb-4 text-center">Company Signup</h2>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Enter company name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <button type="submit" name="company_signup" class="btn btn-primary btn-block">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>