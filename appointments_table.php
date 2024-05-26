<?php
include 'db.php';

$sql = "CREATE TABLE IF NOT EXISTS Appointments (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    date DATE,
    time TIME,
    service VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
)";
?>
