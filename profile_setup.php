<?php
// profile_setup.php
include '../db_connect.php';
session_start();

if (!isset($_SESSION['UserID'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['fullname'];
    $profilePicture = $_FILES['profilePicture']['name'];

    move_uploaded_file($_FILES['profilePicture']['tmp_name'], "../assets/images/" . $profilePicture);

    $userID = $_SESSION['UserID'];
    $sql = "UPDATE users SET fullname='$fullName', profile_picture='$profilePicture' WHERE id='$userID'";

    if ($conn->query($sql) === TRUE) {
        header('Location: dashboard.php');
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Complete Profile</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">
            <h2>Complete Profile</h2>
            <input type="text" name="fullname" placeholder="Full Name" required><br>
            <input type="file" name="profilePicture" required><br>
            <button type="submit">Save Profile</button>
        </form>
    </div>
</body>
</html>
