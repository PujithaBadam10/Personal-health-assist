<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <!-- Boxicons link -->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('https://www.mindinventory.com/blog/wp-content/uploads/2018/10/digital-transformation-in-healthcare.webp')  no-repeat;
            background-size: cover;
            background-position: center;
        }

        .wrapper {
            width: 750px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            color: #fff;
            padding: 40px 35px 55px;
            margin: 0 10px;
        }

        .wrapper h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 20px;
        }

        .input-box {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .input-box .input-field {
            position: relative;
            width: 48%;
            height: 50px;
            margin: 13px 0;
        }

        .input-box .input-field input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            outline: none;
            font-size: 16px;
            color: #fff;
            border-radius: 6px;
            padding: 15px 15px 15px 40px;
        }

        .input-box .input-field input::placeholder {
            color: #fff;
        }

        .input-box .input-field i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #fff;
        }

        .wrapper label {
            display: inline-block;
            font-size: 14.5px;
            margin: 10px 0 23px;
        }

        .wrapper label input {
            accent-color: #fff;
            margin-right: 5px;
        }

        .wrapper .btn {
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }

        .register-link {
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 15px;
        }

        .register-link p a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link p a:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .input-box .input-field {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
    <script>
        function validateRegistrationForm() {
            const fullName = document.getElementById('fullname').value.trim();
            const username = document.getElementById('username').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const declaration = document.getElementById('declaration').checked;

            // Regular expression for email validation
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

            if (fullName === "" || username === "" || email === "" || phone === "" || password === "" || confirmPassword === "") {
                alert("All fields are required!");
                return false;
            } else if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            } else if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            } else if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            } else if (!declaration) {
                alert("You must declare that the information provided is true.");
                return false;
            } else {
                alert("Registration successful!");
                return true;
            }
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <h1>Sign Up</h1>
        <form id="signup-form" action="" method="post" onsubmit="return validateRegistrationForm()">
            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="a" id="fullname" placeholder="Full Name" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-field">
                    <input type="text" name="b" id="username" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <input type="email" name="c" id="email" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-field">
                    <input type="number" name="d" id="phone" placeholder="Phone Number" required>
                    <i class='bx bxs-phone'></i>
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <input type="password" name="e" id="password" placeholder="Password" required>
                    <i class='bx bxs-lock'></i>
                </div>
                <div class="input-field">
                    <input type="password" name="f" id="confirm_password" placeholder="Confirm Password" required>
                    <i class='bx bxs-lock'></i>
                </div>
            </div>
            <label><input type="checkbox" id="declaration"> I declare that the information I’ve provided is correct</label>
            <button type="submit" class="btn"><a href="dashboard.html">Sign up</a></button>
        </form>
        <div class="register-link">
            <p>Already have an account? <a href="login.php">Sign In</a></p>
        </div>
    </div>
</body>
</html>


<?php
// Database configuration
$servername = "localhost";
$username = "root";
$Password_P = "";
$database = "vr";

// Create connection
$conn = new mysqli($servername, $username, $Password_P, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $full_Name = trim($_POST['a']);
    $username = trim($_POST['b']);
    $email = trim($_POST['c']);
    $phone_number = trim($_POST['d']);
    $Password_P = trim($_POST['e']);
    $confirm_Password = trim($_POST['f']);

    // Server-side validation
    if (empty($full_Name) || empty($username) || empty($email) || empty($phone_number) || empty($Password_P) || empty($confirm_Password)) {
        echo "<script>alert('All fields are required!');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address.');</script>";
    } elseif (strlen($Password_P) < 6) {
        echo "<script>alert('Password must be at least 6 characters long.');</script>";
    } elseif ($Password_P !== $confirm_Password) {
        echo "<script>alert('Passwords do not match.');</script>";
    } else {
        // Hash the password
        $hashedPassword = password_hash($Password_P, PASSWORD_DEFAULT);

        // Insert data into database
        $sql = "INSERT INTO signin (full_name, username, email, phone_number, Password_P) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $full_Name, $username, $email, $phone_number, $hashedPassword);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!');</script>";

        } else {
            echo "<script>alert('Error: Could not register user.');</script>";
        }

        $stmt->close();
    }
}

$conn->close();
?>
