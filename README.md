# PHP-User-Authentication-Page

This project is a basic user authentication system built with PHP, HTML, CSS, JavaScript and MySQL. It includes functionalities for user sign-up, sign-in, and session management, allowing users to register, log in, and access a protected index page. The project includes two core components:

Sign In: Validates user credentials and initiates a session upon successful authentication.

Sign Up: Registers new users into the system with secure password hashing.

I used XAMPP for testing the code since it includes phpMyAdmin, which allowed me to create the database and connect it to my code through the config file.

# Project Features:
User Registration: Allows users to create an account with their email, first name, last name, password.

User Login: Authenticates users based on email and password, with password hashing using PHP's password_hash and password_verify functions.

Session Management: Maintains user sessions, ensuring secure access to protected pages.

Logout: Allows users to securely log out and destroy their session.

# Prerequisites:
Web Server: Xampp or any other server that supports PHP.

PHP: Version 7.4 or above.

MYSQL: Version 5.7 or above

# Installation:
1. Clone the repository or download the source code.

2. Set up your MySQL database and import the provided SQL script.

3. Update config.php with your database credentials.

4. Place the project in your server’s root directory (e.g., htdocs for XAMPP).

5. Access the application via your web browser.
