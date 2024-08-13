--Here is a table to create in your MyPHPAdmin or SQL database to store the data from the users that sign up. 

CREATE TABLE IF NOT EXISTS `users` (
 `id` int(11) AUTO_INCREMENT PRIMARY KEY,
 `first_name` varchar(100) NOT NULL,
 `last_name` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `password` varchar(100) NOT NULL,
 `user_type` ENUM('user', 'admin') DEFAULT 'user',
 'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP
 );
