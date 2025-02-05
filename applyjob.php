<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Submitted</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            text-align: center;
            width: 90%;
            max-width: 600px;
            animation: slideIn 0.8s ease-out;
        }
        @keyframes slideIn {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        p {
            font-size: 1rem;
            margin: 10px 0;
        }
        .success {
            color: #4caf50;
            font-weight: bold;
        }
        .error {
            color: #f44336;
            font-weight: bold;
        }
        button {
            background: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 20px;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #43a047;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $phone = htmlspecialchars($_POST['phone']);
            $mail = htmlspecialchars($_POST['mail']);
            $age = htmlspecialchars($_POST['age']);
            $role = htmlspecialchars($_POST['role']);
            
            // Check if a file was uploaded
            if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {
                $uploadDir = 'uploads/';
                $uploadFile = $uploadDir . basename($_FILES['resume']['name']);
                
                // Ensure the upload directory exists
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                if (move_uploaded_file($_FILES['resume']['tmp_name'], $uploadFile)) {
                    $resumeStatus = "<span class='success'>Resume uploaded successfully: " . htmlspecialchars($uploadFile) . "</span>";
                } else {
                    $resumeStatus = "<span class='error'>Failed to upload resume.</span>";
                }
            } else {
                $resumeStatus = "<span class='error'>No resume uploaded or an error occurred.</span>";
            }

            echo "<h1>Application Submitted</h1>";
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Phone:</strong> $phone</p>";
            echo "<p><strong>Email:</strong> $mail</p>";
            echo "<p><strong>Age:</strong> $age</p>";
            echo "<p><strong>Role Interested In:</strong> $role</p>";
            echo "<p><strong>Resume Status:</strong> $resumeStatus</p>";
        }
        ?>
        <button onclick="window.location.href='index.html';">Back to Home</button>
    </div>
</body>
</html>
