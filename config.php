<?php
$servername = "localhost";
$username = "root";
$password = "YOUR_PASSWORD_HERE";
$dbname = "mlb_database";

$conn = new mysqli($servername, $username, $password, $dbname, 8889);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>