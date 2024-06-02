<?php
include("../connection.php");

// Fetch the last displayed post ID from the request
$lastPostId = isset($_GET['last_post_id']) ? intval($_GET['last_post_id']) : 0;

// Check if there are new posts since the last check
$sql = "SELECT COUNT(*) as new_posts FROM post WHERE id > ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $lastPostId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$newPostsCount = $row['new_posts'];
$stmt->close();

echo $newPostsCount;

mysqli_close($conn);
