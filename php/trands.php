<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../connection.php");
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
    <title>Trends</title>
    <link rel="stylesheet" href="../style/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function checkNewPosts() {
                var lastPostId = getLastPostId();
                $.ajax({
                    url: 'check_new_posts.php',
                    type: 'GET',
                    data: {
                        last_post_id: lastPostId
                    },
                    success: function(response) {
                        if (parseInt(response) > 0) {
                            alert('There are ' + response + ' new dit trends posts!');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error checking new posts:', error);
                    }
                });
            }

            function getLastPostId() {
                return $('#lastPostId').val();
            }

            // Call checkNewPosts every 60 seconds
            setInterval(checkNewPosts, 60000);
        });
    </script>
</head>

<body>
    <nav>
        <h1 class="nav-header">🐸 Dit-Trend</h1>
        <ul class="nav-list">
            <li id="current-link"><a href="">Trends</a> </li>
            <li><a href="../php/time-table.php">Time-Table </a></li>
            <li><a href="../php/assignment.php">Assignment </a></li>
            <li><a href="../php/testCollection.php">Test-collection</a></li>
            <li><a href="../php/free-source.php">free-Source </a></li>
            <li><a href="#">Profile</a></li>
            <a href="./logout.php" class="a-btn a-btn-2">Log Out</a>
        </ul>
    </nav>
    <!-- line  -->
    <div class="line"></div>
    <main class="main-trend">
        <div class="newPost">
            <h2>New post</h2>
            <div class="post-div">
                <div class="post-man">
                    <div class="post-man-image">
                        <img src="../assets/HD (18).jpg" class="post-man-imageReal">
                    </div>
                    <div class="post-man-name">
                        <span class="username">@<?php echo $username ?> &starf;</span>
                        <span class="fullname"><?php echo $fullname ?> (you)</span>
                    </div>
                </div>
                <form action="./post.php" method="post" enctype="multipart/form-data" class="newPostForm">
                    <textarea name="posttext" id="" cols="68" rows="5" placeholder="Write something here!" class="wordsTopostArea" required></textarea>
                    <input type="file" name="imageUrl" accept=".jpg, .png, .gif">
                    <input type="submit" value="Post 🎯" class="reaction-btn">
                </form>
            </div>
        </div>
        <div class="main-post">
            <?php
            // Fetch posts from the database
            $sql = "SELECT userId, posttext, imageUrl FROM post ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $userId = htmlspecialchars($row['userId'], ENT_QUOTES, 'UTF-8');
                    $posttext = htmlspecialchars($row['posttext'], ENT_QUOTES, 'UTF-8');
                    $imageUrl = htmlspecialchars($row['imageUrl'], ENT_QUOTES, 'UTF-8');

                    // Fetch user information based on userId
                    $userSql = "SELECT username, name FROM users WHERE id = ?";
                    $userStmt = $conn->prepare($userSql);
                    $userStmt->bind_param("i", $userId);
                    $userStmt->execute();
                    $userResult = $userStmt->get_result();

                    if ($userResult->num_rows > 0) {
                        $userRow = $userResult->fetch_assoc();
                        $postUsername = htmlspecialchars($userRow['username'], ENT_QUOTES, 'UTF-8');
                        $postFullname = htmlspecialchars($userRow['name'], ENT_QUOTES, 'UTF-8');
                    } else {
                        $postUsername = "Unknown";
                        $postFullname = "Unknown";
                    }

                    $userStmt->close();
                    $randomNumber = mt_rand(1, 47);
                    $randomProfile = mt_rand(20, 21);
            ?>
                    <div class="post-div">
                        <div class="post-man">
                            <div class="post-man-image">
                                <img src="../assets/<?php echo $randomProfile ?>.jpg" class="post-man-imageReal">
                            </div>
                            <div class="post-man-name">
                                <span class="username">@<?php echo $postUsername ?> &starf;</span>
                                <span class="fullname"><?php echo $postFullname ?> (student)</span>
                            </div>
                        </div>
                        <p class="postWords">
                            <?php echo $posttext; ?>
                        </p>
                        <?php if (!empty($imageUrl)) { ?>
                            <img src="../assets/<?php echo $randomNumber; ?>.jpg" alt="post" class="postImage">
                        <?php } ?>
                        <form action="../php/index.php" method="post">
                            <input type="button" value="👍" class="reaction-btn">
                            <input type="button" value="👎" class="reaction-btn">
                            <input type="button" value="Comment" class="reaction-btn">
                        </form>
                    </div>
            <?php
                }
            } else {
                echo "<p>No posts available.</p>";
            }
            ?>
        </div>
    </main>

    <footer>
        <div class="line"></div>
        <div class="footer-div">
            <p>Developed by - easyOne Team</p>
            <h2 class="nav-header">🐸 dit-trends</h2>
            <p>copyright | 2024</p>
        </div>
    </footer>
</body>

</html>