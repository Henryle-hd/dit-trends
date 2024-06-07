<?php
include("connection.php");
?>

<?php
session_start(); // Start the session

if (!isset($_SESSION["username"])) {
    header("location: ../login.php"); // Redirect if not logged in
    exit;
}

$username = $_SESSION["username"];
$fullname = $_SESSION['full_name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" href="../assets/android-chrome-256x256.png" type="image/x-icon">
    <title>dit-trends | test collection</title>
</head>

<body>
    <nav>
        <h1 class="nav-header">🐸 Dit-Trend</h1>
        <ul class="nav-list">
            <li><a href="./trands.php">Trends</a> </li>
            <li><a href="./time-table.php">Time-Table </a></li>
            <li><a href="./assignment.php">Assignment </a></li>
            <li><a href="#" id="current-link">Test-collection</a></li>
            <li><a href="./free-source.php">free-Source </a></li>
            <li><a href="#">Profile</a></li>
            <a href="./logout.php" class="a-btn a-btn-2">Log Out</a>
        </ul>
    </nav>
    <!-- line  -->
    <div class="line"></div>
    <main>
        <p>test collection</p>
    </main>

</body>

</html>