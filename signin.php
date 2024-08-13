<?php
include 'config.php';
session_start();

$message = []; 

if (isset($_POST['submit-btn'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['first_name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];
                header('Location: admin_page.php');
                exit();
            } elseif ($row['user_type'] == 'user') {
                $_SESSION['user_name'] = $row['first_name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                header('Location: index.php');
                exit();
            } else {
                $message[] = 'Invalid credentials!';
            }
        } else {
            $message[] = 'Invalid credentials!';
        }
    } else {
        $message[] = 'Invalid credentials!';
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="signin-page">
        <div class="left-section"></div>
        <div class="right-section">
            <div class="container">
                <div class="form-header">
                    <img src="https://cdn.vectorstock.com/i/500p/13/61/home-cooking-logo-on-yellow-in-background-vector-33121361.jpg" height="180" alt="Form Logo" class="logo">
                </div>
                <h1 class="heading">Sign In to your Account</h1>
                <form action="signin.php" method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox" id="show-password">Show Password</label> 
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit-btn" value="Sign In">
                    </div>
                </form>
                <a href="forgot_password.php"><h4>Forgot Password?</h4></a>
<!----------------Set up Google and Facebook API with using composer and PHP, otherwise can remove below.--------------->
                <h4>Sign In with Google or Facebook</h4>
                <ul class="social-icons">
                    <li><a href="#"><i class='fab fa-facebook' style="color:#1877F2"></i></a></li>
                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                </ul>
                <h4>Don't have an account? <a href="signup.php">Sign Up</a></h4>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>