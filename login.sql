CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('fan', 'coach', 'admin') NOT NULL
);

-- Insert test users
INSERT INTO users (username, password, role) VALUES
('fanUser', 'fanPassword', 'fan'),
('coachUser', 'coachPassword', 'coach'),
('adminUser', 'adminPassword', 'admin');
