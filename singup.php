<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dit trenda | signup</title>
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
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .terms {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .terms input[type="checkbox"] {
            margin-right: 10px;
        }

        .terms a {
            color: #007BFF;
            text-decoration: none;
        }

        .terms a:hover {
            text-decoration: underline;
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
            <h1>Sign Up</h1>
            <form id="signup-form" action="server-validation.php" method="post">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Name..." required>
                <span id="name-error" class="error-message"></span>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email address..." required>
                <span id="email-error" class="error-message"></span>

                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username..." required>
                <span id="username-error" class="error-message"></span>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <span id="password-error" class="error-message"></span>

                <label for="repeat-password">Repeat Password</label>
                <input type="password" id="repeat-password" name="repeat-password" placeholder="Repeat Password" required>
                <span id="repeat-password-error" class="error-message"></span>

                <div class="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I agree to the <a href="#">Terms of User</a></label>
                </div>

                <button type="submit">Sign Up</button>
            </form>
            <a href="./login.php" class="signin-link">Sign in →</a>
        </div>
    </div>

    <script>
        document.getElementById('signup-form').addEventListener('submit', function(event) {
            event.preventDefault();
            validateForm();
        });

        function validateForm() {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
            const repeatPassword = document.getElementById('repeat-password').value;

            // Regular expressions for validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;

            // Resetting previous errors
            document.querySelectorAll('.error-message').forEach(function(element) {
                element.textContent = '';
            });

            let isValid = true;

            // Validate name
            if (name.split(' ').length < 2) {
                document.getElementById('name-error').textContent = 'Full name should be at least two names';
                isValid = false;
            }

            // Validate email
            if (!emailRegex.test(email)) {
                document.getElementById('email-error').textContent = 'Invalid email format';
                isValid = false;
            }

            // Validate username
            if (username.includes(' ')) {
                document.getElementById('username-error').textContent = 'Username should not contain spaces';
                isValid = false;
            }

            // Validate password
            if (!passwordRegex.test(password)) {
                document.getElementById('password-error').textContent = 'Password should be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one digit.';
                isValid = false;
            }

            // Validate repeat password
            if (password !== repeatPassword) {
                document.getElementById('repeat-password-error').textContent = 'Passwords do not match';
                isValid = false;
            }

            if (isValid) {
                // Form is valid, submit it
                document.getElementById('signup-form').submit();
            }
        }
    </script>
</body>

</html>