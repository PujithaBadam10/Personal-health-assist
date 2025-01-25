<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sign-In Form">
    <title>Sign In</title>

    <!-- Link to Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .signin-container {
            background-color: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .input-container {
            position: relative;
            margin-bottom: 20px;
        }

        .input-container input {
            width: 100%;
            padding: 12px 40px 12px 40px;
            border-radius: 30px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            font-size: 14px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease;
        }

        .input-container input:focus {
            outline: none;
            border-color: #74ebd5;
        }

        .input-container i {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #888;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #74ebd5;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #4fd3c4;
        }

        .bottom-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .bottom-text a {
            color: green;
            text-decoration: none;
        }

        .bottom-text a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 12px;
            text-align: center;
            margin-bottom: 15px;
        }

        @media (max-width: 500px) {
            .signin-container {
                padding: 20px;
                width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="signin-container">
    <h2>Sign In</h2>

    <!-- Display error message if any -->
    <p class="error" id="error-message"></p>

    <form id="signin-form" method="POST" action: home1.com>
        <div class="input-container">
            <i class="fas fa-user"></i>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="input-container">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <input type="submit" value="Sign In" name="signin"><a href="dashboard.html">Reset here</a></p>
    </form>

    <div class="bottom-text">
        <p>Forgot your password? <a href="#">Reset here</a></p>
        <p>Don't have an account? <a href="signup.php">Register here</a></p>
    </div>
</div>


</body>
</html>


<?php
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    $c = mysqli_connect("localhost", "root", "");
    if (!$c) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    mysqli_select_db($c, "re");

    // Check user credentials
    $s = "SELECT * FROM reg WHERE email='$email' AND Password_='$password'";
    $result = mysqli_query($c, $s);
    $user = mysqli_fetch_array($result);

    if ($user && $user['Email'] == $email && $user['Password_'] == $password) {
        $username = $user['Full_Name'];

        // Log the successful login
        $log_query = "INSERT INTO login_logs (email) VALUES ('$email')";
        if (mysqli_query($c, $log_query)) {
            echo "<script>alert('Login successful!');</script>";
            header("Location: dashboard.html");
            exit();
        } else {
            echo "<script>alert('Error logging login: " . mysqli_error($c) . "');</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password.'); window.location.href='signup.php';</script>";
    }

    // Close the database connection
    mysqli_close($c);
}
?>

