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