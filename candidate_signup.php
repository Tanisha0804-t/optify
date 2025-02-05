<?php
if (isset($_POST['candidate_signup'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection (replace with your actual connection details)
    include 'database1.php';

    // Insert candidate data into the database
    $sql = "INSERT INTO candidate_signup (name, email, password) VALUES ('$name', '$email', '$password')"; 

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        echo "<script>alert('Registration successful!');</script>";
        header("Location: candidate_login.php"); // Redirect to login page
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
    <title>Optify - Candidate Signup</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="signup.css"> 
</head>
<body>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mx-auto">
                <div class="login-box">
                    <h2 class="mb-4 text-center">Candidate Signup</h2>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <button type="submit" name="candidate_signup" class="btn btn-primary btn-block">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>