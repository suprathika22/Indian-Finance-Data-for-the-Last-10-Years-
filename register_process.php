<?php
// Database connection details
$host = '127.0.0.1';
$user = 'root';
$pass = ''; // Replace with your MySQL password
$database = 'finance_data';

// Create connection
$conn = mysqli_connect($host, $user, $pass, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle registration
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("<p style='color: red; text-align: center;'>Passwords do not match. Please try again.</p>");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "<p style='color: green; text-align: center;'>Registration successful. You can now <a href='login.php'>login</a>.</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

mysqli_close($conn);
?>
