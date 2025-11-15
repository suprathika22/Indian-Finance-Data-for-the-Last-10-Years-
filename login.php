<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Indian Finance Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Indian Finance Data</h1>
    <p>Explore the financial trends of the past decade</p>
</header>

<main>
    <form action="login_process.php" method="POST">
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </form>
</main>

<footer>
    <p>&copy; 2024 Indian Finance Data | All Rights Reserved</p>
</footer>
</body>
</html>
