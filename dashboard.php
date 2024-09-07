<?php
// dashboard.php
include '../db_connect.php';
session_start();

if (!isset($_SESSION['UserID'])) {
    header('Location: login.php');
    exit();
}

$userID = $_SESSION['UserID'];
$sql = "SELECT * FROM users WHERE id='$userID'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <h1>ByteBarrage</h1>
            <a href="#">User Info</a>
            <a href="#">Water Levels Data</a>
            <a href="#">Flowrates</a>
            <a href="#">Gates Info</a>
            <a href="#">Weather Data</a>
            <a href="#">Maintenance</a>
        </div>

        <div class="main-content">
            <div class="user-info">
                <img src="../assets/images/<?php echo $user['profile_picture']; ?>" alt="Profile Picture">
                <h2>Hello, <?php echo $user['fullname']; ?></h2>
            </div>
            
            <div class="chart-container">
                <!-- Chart content goes here -->
            </div>
        </div>
    </div>
</body>
</html>
