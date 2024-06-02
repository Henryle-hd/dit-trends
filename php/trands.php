<?php
include("connection.php");
?>

<?php
session_start(); // Start the session

if (!isset($_SESSION["username"])) {
    header("location: login.php"); // Redirect if not logged in
    exit;
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trends</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <nav>
        <h1 class="nav-header">🐸 Dit-Trend</h1>
        <ul class="nav-list">
            <li><a href="../index.html">Home </a></li>
            <li id="current-link"><a href="">Trends</a> </li>
            <li><a href="../php/time-table.php">Time-Table </a></li>
            <li><a href="">Assignment </a></li>
            <li><a href="">Test-collection</a></li>
            <li><a href="">free-Source </a></li>
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
                        <span class="username"><?php echo $username ?> &starf;</span>
                        <span class="fullname">henry dioniz (student)</span>
                    </div>
                </div>
                <form action="../php/index.php" method="post" class="newPostForm">
                    <textarea name="" id="" cols="68" rows="5" placeholder="Write something here!" class="wordsTopostArea"></textarea>
                    <input type="file">
                    <input type="submit" value="Post 🎯" class="reaction-btn">
                </form>
            </div>
        </div>
        <div class="main-post">
            <div class="post-div">
                <div class="post-man">
                    <div class="post-man-image">
                        <img src="../assets/hd passphoto.jpg" class="post-man-imageReal">
                    </div>
                    <div class="post-man-name">
                        <span class="username">@mwombeck &starf;</span>
                        <span class="fullname">mwombeck dioniz (student)</span>
                    </div>
                </div>
                <p class="postWords">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium ex at sed pariatur atque minima recusandae maiores rem nisi. Quaerat placeat animi impedit in, veniam odio aliquid. Laborum, ex rem.
                </p>
                <img src="../assets/my classmates (6).jpg" alt="post" class="postImage">
                <form action="../php/index.php" method="post">
                    <input type="button" value="200k👍" class="reaction-btn">
                    <input type="button" value="29k👎" class="reaction-btn">
                    <input type="button" value="Comment" class="reaction-btn">
                </form>
            </div>

            <div class="post-div">
                <div class="post-man">
                    <div class="post-man-image">
                        <img src="../assets/HD (18).jpg" class="post-man-imageReal">
                    </div>
                    <div class="post-man-name">
                        <span class="username">@henrylee_hd &starf;</span>
                        <span class="fullname">henry dioniz (student)</span>
                    </div>
                </div>
                <p class="postWords">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium ex at sed pariatur atque minima recusandae maiores rem nisi. Quaerat placeat animi impedit in, veniam odio aliquid. Laborum, ex rem.
                </p>
                <img src="../assets/333027476_1153098055365971_7334930364893427824_n.jpg" alt="post" class="postImage">
                <form action="/php/index.php" method="post">
                    <input type="button" value="100k 👍" class="reaction-btn">
                    <input type="button" value="29k👎" class="reaction-btn">
                    <input type="button" value="Comment" class="reaction-btn">
                </form>
            </div>
            <div class="post-div">
                <div class="post-man">
                    <div class="post-man-image">
                        <img src="../assets/HD (18).jpg" class="post-man-imageReal">
                    </div>
                    <div class="post-man-name">
                        <span class="username">@henrylee_hd &starf;</span>
                        <span class="fullname">henry dioniz (student)</span>
                    </div>
                </div>
                <p class="postWords">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium ex at sed pariatur atque minima recusandae maiores rem nisi. Quaerat placeat animi impedit in, veniam odio aliquid. Laborum, ex rem.
                </p>
                <img src="../assets/cbetime.jpg" alt="post" class="postImage">
                <form action="/php/index.php" method="post">
                    <input type="button" value="100k 👍" class="reaction-btn">
                    <input type="button" value="29k👎" class="reaction-btn">
                    <input type="button" value="Comment" class="reaction-btn">
                </form>
            </div>
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