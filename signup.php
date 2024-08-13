<?php
require_once('config.php');

$message = "";
$firstName = "";
$lastName = "";
$email = "";
$password = "";
$confirmPassword = "";

if (isset($_POST['submit-btn'])) {
    $firstName = $conn->real_escape_string($_POST['first_name']);
    $lastName = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['cpassword'];

    if ($password !== $confirmPassword) {
        $message = "Passwords do not match.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute query
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);

        if ($stmt->execute()) {
            $message = "Registration successful! Please verify your email to sign in.";
            header("Location: signin.php");
            exit();
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Page</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="signin-page"> 
        <div class="left-section1"></div>
        <div class="right-section">
            <div class="container">
                <form action="signup.php" method="post" onsubmit="return validateForm()">
                    <div class="form-header">
                        <img src="https://cdn.vectorstock.com/i/500p/13/61/home-cooking-logo-on-yellow-in-background-vector-33121361.jpg" height="180" alt="Form Logo">
                    </div>
                    <h1 class="heading">Create your Account</h1>
                    <div class="form-group">
                        <label for="first_name">First name:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password:</label>
                        <input type="password" id="cpassword" name="cpassword" required>
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox" id="show-password"> Show Password</label> 
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit-btn" value="Sign up now">
                    </div>
<!----------------Set up Google and Facebook API with using composer and PHP, otherwise can remove below.--------------->
                    <h4>Create Account with Google or Facebook</h4>
                    <ul class="social-icons">
                        <li><a href="#"><i class='fab fa-facebook' style="color:#1877F2"></i></a></li>
                        <li><a href="#"><i class="fab fa-google"></i></a></li>
                    </ul>
                    <h4>Already have an account? <a href="signin.php">Sign In</a></h4>
                </form>
                <?php if ($message): ?>
                    <p><?= $message ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>