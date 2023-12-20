CREATE DATABASE your_database_name;
USE your_database_name;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES
('user1', 'pass1'),
('user2', 'pass2');
