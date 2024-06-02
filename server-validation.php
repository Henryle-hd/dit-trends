<?php
include_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat-password'];
    $terms = isset($_POST['terms']) ? true : false;

    $errors = [];

    // Validate full name
    if (str_word_count($name) < 2) {
        $errors['name'] = 'Full name should be at least two names';
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    // Validate username
    if (strpos($username, ' ') !== false) {
        $errors['username'] = 'Username should not contain spaces';
    }

    // Validate password
    $password_regex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/';
    if (!preg_match($password_regex, $password)) {
        $errors['password'] = 'Password should be strong';
    }

    // Validate repeat password
    if ($password !== $repeat_password) {
        $errors['repeat_password'] = 'Passwords do not match';
    }

    // Validate terms
    if (!$terms) {
        $errors['terms'] = 'You must agree to the terms of use';
    }

    if (empty($errors)) {
        // No errors, proceed with registration logic

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (name, email, username, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $username, $hashed_password);

        if ($stmt->execute()) {
            echo "New record created successfully";
            // Redirect to a success page
            header("Location: ./html/trandes.html");
            exit(); // Ensure script stops execution after redirection
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        // There are errors, display them to the user
        foreach ($errors as $field => $error) {
            echo "<p class='error-message'>{$error}</p>";
        }
    }
}
