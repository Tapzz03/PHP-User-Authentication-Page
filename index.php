<?php
session_start();

// Check if the user is signed in
if (!isset($_SESSION['user_name'])) {
    header('Location: signin.php');
    exit();
}

$userName = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo htmlspecialchars($userName); ?>!</h1>
    </header>

    <main>
        <h2>Successful Sign In! You are now on the home page.</h2>
        <a href="logout.php">Logout</a>
    </main>
</body>
</html>