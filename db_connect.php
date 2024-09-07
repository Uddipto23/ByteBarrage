<?php
// db_connect.php
$host = "localhost";
$user = "root";  // Update with your DB username
$password = "";  // Update with your DB password
$dbname = "your_database_name";  // Update with your database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
