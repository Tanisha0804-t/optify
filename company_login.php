<?php
session_start();

if (isset($_POST['company_login'])) {
    $company_email = $_POST['email'];
    $company_password = $_POST['password'];

    // Database connection (replace with your actual credentials)
    include 'database1.php';

    $sql = "SELECT * FROM company_signup WHERE email = '$company_email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($company_password, $row['password'])) { 
            $_SESSION['company_id'] = $row['id']; 
            $_SESSION['company_name'] = $row['company_name']; 
            header("Location: company_dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid email or password.');</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password.');</script>";
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Optify - Company Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="comp.css"> 
</head>
<body>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mx-auto">
                <div class="login-box">
                    <h2 class="mb-4 text-center">Company Login</h2>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
                        <div class="form-group">
                            <label for="company_email">Email</label>
                            <input type="email" id="company_email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="company_password">Password</label>
                            <input type="password" id="company_password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <button type="submit" name="company_login" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>