<?php
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $errors = [];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Bind result variables
        $stmt->bind_result($id, $stored_username, $stored_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $stored_password)) {
            // Password is correct, start a session
            session_start();
            $_SESSION['username'] = $stored_username;
            $_SESSION['user_id'] = $id;
            header("Location: ./php/trands.php");
        } else {
            $errors['password'] = "Incorrect password.";
        }
    } else {
        $errors['username'] = "Username does not exist.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dit trends | Sign In</title>
    <style>
        /* styles.css */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f0f0f0;
        }

        .container {
            display: flex;
            width: 70%;
            max-width: 1000px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: #fff;
            border-radius: 0.5em;
            overflow: hidden;
        }

        .image-section {
            width: 50%;
            background: url('./assets/hdFOrm.jpg') center center/cover no-repeat;
            filter: brightness(0.5) sepia(0.4) hue-rotate(150deg);
        }

        .form-section {
            width: 50%;
            padding: 40px;
        }

        h1 {
            margin-top: 0;
            font-size: 2em;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        button {
            padding: 10px;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            margin-top: 10px;
            background-color: black;
        }

        button:hover {
            background: #333;
        }

        .signin-link {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: #007BFF;
            text-decoration: none;
        }

        .signin-link:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            font-size: 0.8em;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image-section">
            <!-- <img src="./assets/formIMage.jpg" alt=""> -->
        </div>
        <div class="form-section">
            <h1>Sign In</h1>
            <form id="signup-form" action="login.php" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username..." required>
                <?php if (isset($errors['username'])) : ?>
                    <span class="error-message"><?= $errors['username'] ?></span>
                <?php endif; ?>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <?php if (isset($errors['password'])) : ?>
                    <span class="error-message"><?= $errors['password'] ?></span>
                <?php endif; ?>

                <button type="submit">Sign In</button>
            </form>
            <a href="./singup.php" class="signin-link">Sign Up →</a>
        </div>
    </div>
</body>

</html>