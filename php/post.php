<?php
include("../connection.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Start the session at the beginning
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$posttext = isset($_POST['posttext']) ? $_POST['posttext'] : '';
$imageUrl = isset($_FILES['imageUrl']['name']) ? $_FILES['imageUrl']['name'] : '';
$userId = $_SESSION['user_id'];

echo $posttext;
echo $imageUrl;
echo $userId;

if (!empty($posttext)) {
    $sql = "INSERT INTO post (posttext, imageUrl, userId) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $posttext, $imageUrl, $userId);

    if ($stmt->execute()) {
        $last_id = $stmt->insert_id;
        if (!empty($imageUrl)) {
            $upload_dir = '../uploads/';
            $upload_file = $upload_dir . basename($imageUrl);
            if (move_uploaded_file($_FILES['imageUrl']['tmp_name'], $upload_file)) {
                // Update $imageUrl with full path
                $imageUrl = $upload_file;
                echo "File is valid, and was successfully uploaded.\n";
            } else {
                echo "Upload failed\n";
            }
        }
        echo "New post created successfully\n";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Post text cannot be empty";
}

header("Location: trands.php");
mysqli_close($conn);
exit();
