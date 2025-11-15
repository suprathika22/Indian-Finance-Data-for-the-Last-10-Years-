<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Indian Finance Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Indian Finance Data</h1>
    <p>Join us to explore the financial insights</p>
</header>

<main>
    <form action="register_process.php" method="POST">
        <h2>Register</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit">Register</button>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
</main>

<footer>
    <p>&copy; 2024 Indian Finance Data | All Rights Reserved</p>
</footer>
</body>
</html>
