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

!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trends</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" href="../assets/android-chrome-256x256.png" type="image/x-icon">
    <style>
        table,
        td,
        th {
            border: 1px solid black
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <nav>
        <h1 class="nav-header">🐸 Dit-Trend</h1>
        <ul class="nav-list">
            <li><a href="../index.html">Home </a></li>
            <li><a href="../html/trandes.html">Trends</a> </li>
            <li id="current-link"><a href="../php/time-table.php">Time-Table </a></li>
            <li><a href="">Assignment </a></li>
            <li><a href="">Test-collection</a></li>
            <li><a href="">free-Source </a></li>
        </ul>
    </nav>
    <!-- line  -->
    <div class="line"></div>
    <main class="main-time-table">
        <div class="streamA stream-div">
            <h2>STREAM A</h2>
            <table>
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                </tr>
                <tr>
                    <td>7:00 - 10:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>10:00 - 13:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>13:00 - 16:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>16:00 - 19:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>19:00 - 22:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <button>Download 🎒</button>
        </div>
        <div class="streamB stream-div">
            <h2>STREAM B</h2>
            <table>
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <button>Download 🎒</button>
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
<?php
echo '';
