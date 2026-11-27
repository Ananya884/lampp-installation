CREATE DATABASE sampledb;
CREATE USER 'webuser'@'localhost' IDENTIFIED BY 'YOUR_PASSWORD';
GRANT ALL PRIVILEGES ON sampledb.* TO 'webuser'@'localhost';
USE sampledb;
CREATE TABLE students (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50), course VARCHAR(50));
INSERT INTO students (name, course) VALUES ('Ananya', 'Cloud and DevOps'), ('Arun', 'Linux Administration'), ('Meera', 'AWS Fundamentals');
