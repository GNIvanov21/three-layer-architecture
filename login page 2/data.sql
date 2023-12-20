CREATE DATABASE usersdb;
USE usersdb;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES
('admin', 'admin'),
('admin1 ', 'admin1');
