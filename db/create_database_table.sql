CREATE DATABASE College;

USE College;

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    company_name VARCHAR(50) NOT NULL,
    hours_worked DECIMAL(5, 2) NOT NULL
);