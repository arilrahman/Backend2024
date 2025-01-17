--
CREATE DATABASE IF NOT EXISTS hrd_api;
USE hrd_api;

-- 
DROP TABLE IF EXISTS employees;

-- 
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(50),
    phone VARCHAR(15),
    position VARCHAR(50)
);
-- Menambahkan data ke tabel employees
INSERT INTO employees (name, email, phone, position) VALUES
('John Doe', 'john@example.com', '1234567890', 'Manager'),
('Jane Smith', 'jane@example.com', '0987654321', 'HR'),
('Alice Johnson', 'alice@example.com', '1122334455', 'Developer'),
('Bob Brown', 'bob@example.com', '2233445566', 'Designer'),
('Charlie Davis', 'charlie@example.com', '3344556677', 'Tester');
